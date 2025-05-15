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
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->text('problem')->nullable();
            $table->unsignedBigInteger('equipment_id')->default(1)->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipment'); //หากจะใช้ ต้องมีunsignedBigInteger และสร้าง id ที่จะเชื่อมต่อก่อน
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};
