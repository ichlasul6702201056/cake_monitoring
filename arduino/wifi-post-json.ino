#include <HardwareSerial.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

// wifi
String wifi_ssid = "ssid";
String wifi_pass = "password";

void setup() {
  // put your setup code here, to run once:
Serial.begin(115200);
WiFi.begin(wifi_ssid.c_str(), wifi_pass.c_str());
    while (WiFi.status() != WL_CONNECTED){
      Serial.print(".");
      delay(500);
    }
    Serial.println("");
    Serial.println("wifi connected");
}

void loop() {
  // put your main code here, to run repeatedly:
posthttp();
delay(1000);
}

void posthttp() {
  Serial.println("Posting");
  String url = "http://192.168.43.12:8080/api/esp";
  HTTPClient http;
  String response;

  // Preset JSON data
  String jsonParams = "{\"pos\":\"A\",\"temp\":30,\"humid\":60,\"gas\":15}";

  Serial.print("json encoded data  : ");
  Serial.println(jsonParams);

  // Connect to the target host
  http.begin(url);
  http.addHeader("Content-Type", "application/json");
  int statuscode = http.POST(jsonParams);
  response = http.getString();
   Serial.println(response);
  Serial.println(statuscode);
}