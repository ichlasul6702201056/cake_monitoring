<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensordatas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('humid_1', 5, 2);
            $table->decimal('humid_2', 5, 2);
            $table->decimal('humid_3', 5, 2);
            $table->decimal('temperature_1', 5, 2);
            $table->decimal('temperature_2', 5, 2);
            $table->decimal('temperature_3', 5, 2);
            $table->decimal('gas_1');
            $table->decimal('gas_2');
            $table->decimal('gas_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensordatas');
    }
};
