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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->String('nama');
            $table->String('noTelp');
            $table->foreignId('idLapangan');
            $table->foreignId('idJadwal');
            $table->String('jam');
            $table->text('buktiBooking')->nullable();
            $table->integer('uangDp')->nullable();
            $table->integer('sisa');
            $table->String('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
