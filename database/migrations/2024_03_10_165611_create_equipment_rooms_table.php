<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable()->comment('ชื่อที่จะนำไปปรากฎที่ปุ่ม');
            $table->string('number_equipment')->nullable()->comment('เลขหนุพันธ์อุปกรณ์');
            $table->unsignedBigInteger('equipment_id')->nullable()->comment('id อุปกรณ์อิเล็กทรอนิกส์');
            $table->unsignedBigInteger('room_id')->nullable()->comment('idของห้อง');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_rooms');
    }
};
