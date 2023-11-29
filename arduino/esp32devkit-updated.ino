// <30.30;60.30;1.24>

#include <HardwareSerial.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

// Example 5 - Receive with start- and end-markers combined with parsing
#define SERIAL_ARDUINO Serial1

const byte numChars = 32;
char receivedChars[numChars];
char tempChars[numChars];        // temporary array for use when parsing

float suhu = 0.0;
float humid = 0.0;
float nh = 0.0;
const uint64_t interval_upload = 5000;
static uint64_t last_upload;
boolean newData = false;

// Wifi
String wifi_ssid = "ssid";
String wifi_pass = "password";

// Deklarasikan fungsi
void posthttp();


//============

void setup() {
  // begin the serial
    Serial.begin(115200);
    SERIAL_ARDUINO.begin(9600, SERIAL_8N1, 16, 17); //rxd2 txd2

    // connect wifi
    Serial.println("Connecting to wifi ...");
    WiFi.begin(wifi_ssid.c_str(), wifi_pass.c_str());
    while (WiFi.status() != WL_CONNECTED){
      Serial.print(".");
      delay(500);
    }
    Serial.println("");
    Serial.println("wifi connected");
}

//============

void loop() {

    recvWithStartEndMarkers();
    if (newData == true) {
        strcpy(tempChars, receivedChars);
            // this temporary copy is necessary to protect the original data
            //   because strtok() used in parseData() replaces the commas with \0
        parseData();
        showParsedData();
        newData = false;
        if(millis() > (last_upload + interval_upload)){
          last_upload = millis();
          posthttp();
        }
    }
}

//============

void recvWithStartEndMarkers() {
    static boolean recvInProgress = false;
    static byte ndx = 0;
    char startMarker = '<';
    char endMarker = '>';
    char rc;

    while (SERIAL_ARDUINO.available() > 0 && newData == false) {
//      while (Serial.available() > 0 && newData == false) {
        rc = SERIAL_ARDUINO.read();
//        rc = Serial1.read();
        
        if (recvInProgress == true) {
            if (rc != endMarker) {
                receivedChars[ndx] = rc;
                ndx++;
                if (ndx >= numChars) {
                    ndx = numChars - 1;
                }
            }
            else {
                receivedChars[ndx] = '\0'; // terminate the string
                recvInProgress = false;
                ndx = 0;
                newData = true;
            }
        }

        else if (rc == startMarker) {
            recvInProgress = true;
        }
    }
}

//============

void parseData() {      // split the data into its parts

    char * strtokIndx; // this is used by strtok() as an index

    strtokIndx = strtok(tempChars, ";");
    suhu = atoi(strtokIndx);

    strtokIndx = strtok(NULL, ";");
    humid = atoi(strtokIndx);

    strtokIndx = strtok(NULL, ";");
    nh = atoi(strtokIndx);
}

//============

void showParsedData() {
    Serial.print("suhu ");
    Serial.println(suhu);
    Serial.print("humid ");
    Serial.println(humid);
    Serial.print("nh ");
    Serial.println(nh);
}

void posthttp() {
  Serial.println("Posting");
  String url = "http://192.168.43.12:8080/api/esp";
    HTTPClient http;
  String response;

  // deklarasi variabel json dan ukurannya
  StaticJsonDocument<200> buff;
  String jsonParams;
  // pembuatan data json
  buff["pos"] = "A";
  buff["temp"] = suhu;
  buff["humid"] = humid;
  buff["gas"] = nh;

  serializeJson(buff, jsonParams);
  Serial.print("json encoded data  : ");
  Serial.println(jsonParams);

  // melakukan sambungan ke host tujuan
  http.begin(url);
  http.addHeader("Content-Type", "application/json");
  int statuscode = http.POST(jsonParams);
  response = http.getString();
   Serial.println(response);
  Serial.println(statuscode);
}
