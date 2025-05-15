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
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->nullable();
            $table->string('time')->nullable()->comment('วันเวลาที่เจ้าหน้าที่สามารถแก้ไขได้');
            $table->unsignedBigInteger('usertype')->nullable()->comment('ผู้ที่ใช้ความสำคัญนี้ได้');
            $table->string('color')->nullable()->comment('สีของความสำคัญนี้');
            $table->text('description')->nullable()->comment('รายละเอียด');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
