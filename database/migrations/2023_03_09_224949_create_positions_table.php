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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor')->nullable()->comment('เลขชั้นของตึก');
            $table->string('room')->nullable()->comment('ชื่อไอดีห้องแต่ละชั้น');
            $table->integer('repair')->default(0)->comment('จำนวนการแจ้งซ่อมในชั้น');
            $table->string('admin_room')->nullable()->comment('ชื่อผู้เป็นเจ้าของห้อง');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
