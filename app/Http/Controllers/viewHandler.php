<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensordata;
use Illuminate\Support\Facades\DB;

class viewHandler extends Controller
{
    public function index()
    {
        return view('base');
    }
    public function main()
    {
        return view('main');
    }
    public function live()
    {
        $data = DB::table('sensordatas')
            ->orderBy('created_at', 'desc')
            ->first();
        // menentukan kondisi wcarna suhu
        if ($data->temperature_1 < 27 or $data->temperature_1 > 34) {
            $colortemp_1 = 'danger';
        } else {
            $colortemp_1 = 'success';
        }
        if ($data->temperature_2 < 27 or $data->temperature_2 > 34) {
            $colortemp_2 = 'danger';
        } else {
            $colortemp_2 = 'success';
        }
        if ($data->temperature_3 < 27 or $data->temperature_3 > 34) {
            $colortemp_3 = 'danger';
        } else {
            $colortemp_3 = 'success';
        }


        // menentukan kondisi warna kelembaban
        if ($data->humid_1 < 40 or $data->humid_1 > 65) {
            $colorhumid_1 = 'danger';
        } else {
            $colorhumid_1 = 'success';
        }
        if ($data->humid_2 < 40 or $data->humid_2 > 65) {
            $colorhumid_2 = 'danger';
        } else {
            $colorhumid_2 = 'success';
        }
        if ($data->humid_3 < 40 or $data->humid_3 > 65) {
            $colorhumid_3 = 'danger';
        } else {
            $colorhumid_3 = 'success';
        }


        // menentukan kondisi warna gas
        if ($data->gas_1 > 15) {
            $colorgas_1 = 'danger';
        } else {
            $colorgas_1 = 'success';
        }
        if ($data->gas_2 > 15) {
            $colorgas_2 = 'danger';
        } else {
            $colorgas_2 = 'success';
        }
        if ($data->gas_3 > 15) {
            $colorgas_3 = 'danger';
        } else {
            $colorgas_3 = 'success';
        }


        return view('live', compact('data', 'colortemp_1', 'colortemp_2', 'colortemp_3', 'colorhumid_1', 'colorhumid_2', 'colorhumid_3', 'colorgas_1', 'colorgas_2', 'colorgas_3'));
    }



    public function table(Request $request)
    {
        // inisialisasi nilai posisi dan tanggal variabel tersebut kosong
        if (isset($request->posisi)) {
            $posisi = $request->posisi;
        } else {
            $posisi = 'A';
        }

        if (isset($request->tanggal)) {
            $tanggal = $request->tanggal;
        } else {
            $tanggal = date("Y-m-d h:i");
        }


        // mengambil data sesuai dengan posisi dan tanggal yang diminta
        switch ($posisi) {
            case 'A':
                $data = DB::table("sensordatas")
                    ->select("created_at", "temperature_1", "humid_1", "gas_1")
                    ->where("created_at", "<", $tanggal)
                    ->orderBy("created_at", "desc")
                    ->limit(100)
                    ->get();
                $pos = 'A';
                break;
            case 'B':
                $data = DB::table("sensordatas")
                    ->select("created_at", "temperature_2", "humid_2", "gas_2")
                    ->where("created_at", "<", $tanggal)
                    ->orderBy("created_at", "desc")
                    ->limit(100)
                    ->get();
                $pos = 'B';
                break;
            case 'C':
                $data = DB::table("sensordatas")
                    ->select("created_at", "temperature_3", "humid_3", "gas_3")
                    ->where("created_at", "<", $tanggal)
                    ->orderBy("created_at", "desc")
                    ->limit(100)
                    ->get();
                $pos = 'C';
                break;
        }
        return view('table', compact('data', 'posisi', 'pos'));
    }

    public function about()
    {
        return view('about');
    }
}