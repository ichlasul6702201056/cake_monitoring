<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Carbon;

use App\Models\sensordata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class postHandler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table("sensordatas")
        ->select("created_at", "temperature_1", "humid_1", "gas_1")
        ->orderBy("created_at", "desc")
        ->paginate(5);
        return $data;
    }

    /**
     * Menyimpan data dari esp ke dalam database.
     */
    public function store(Request $request)
    {
        // menerima data dari 3 esp
        $data = $request->toArray();
        $sensorLocation = $data['pos'];
        switch ($sensorLocation) {
            case 'A':
                Cache::add('humid_1', $data['humid']);
                Cache::add('temperature_1', $data['temp']);
                Cache::add('gas_1', $data['gas']);
                Cache::add('PosA', true);
                break;
            case 'B':
                Cache::add('humid_2', $data['humid']);
                Cache::add('temperature_2', $data['temp']);
                Cache::add('gas_2', $data['gas']);
                Cache::add('PosB', true);
                break;
            case 'C':
                Cache::add('humid_3', $data['humid']);
                Cache::add('temperature_3', $data['temp']);
                Cache::add('gas_3', $data['gas']);
                Cache::add('PosC', true);
                
                break;
        }

        if (Cache::get('PosA')) {
            $compiledData = array(
                'humid_1' => Cache::get('humid_1'),
                'humid_2' => Cache::get('humid_1'),
                'humid_3' => Cache::get('humid_1'),
                'temperature_1' => Cache::get('temperature_1'),
                'temperature_2' => Cache::get('temperature_1'),
                'temperature_3' => Cache::get('temperature_1'),
                'gas_1' => Cache::get('gas_1'),
                'gas_2' => Cache::get('gas_1'),
                'gas_3' => Cache::get('gas_1'),
            );
        }


        // if (Cache::get('PosA') && Cache::get('PosB') && Cache::get('PosC')) {
            // membuat kompilasi data dari 3 input 
            // $compiledData = array(
                // 'humid_1' => Cache::get('humid_1'),
                // 'humid_2' => Cache::get('humid_2'),
                // 'humid_3' => Cache::get('humid_3'),
                // 'temperature_1' => Cache::get('temperature_1'),
                // 'temperature_2' => Cache::get('temperature_2'),
                // 'temperature_3' => Cache::get('temperature_3'),
                // 'gas_1' => Cache::get('gas_1'),
                // 'gas_2' => Cache::get('gas_2'),
                // 'gas_3' => Cache::get('gas_3'),
            // );

            // memasukkan data ke dalam database
            try
            {
                $query = sensordata::create($compiledData);
            }
                catch(Exception $e)
            {
                dd($e->getMessage());
            }
            
            // menghapus cache pada server untuk menerima data baru
            Cache::flush();
            return 0;
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
