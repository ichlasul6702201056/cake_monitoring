<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensordata extends Model
{
    use HasFactory;
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
    protected $fillable = [
        'humid_1', 'humid_2', 'humid_3', 'temperature_1', 'temperature_2', 'temperature_3', 'gas_1', 'gas_2', 'gas_3'
    ];
}
