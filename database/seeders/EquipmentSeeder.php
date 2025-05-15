<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipment')->insert([
            'name' => 'ข้อมูลอุปกรณ์นี้ถูกลบไปแล้ว',
            'label_button' => 'none',
            'description' => 'เจ้าหน้าที่หรือคณะอาจารย์ ได้ทำการนำอุปกรณ์นี้ออกจากระบบไปแล้ว ',
            'created_at' => now(),
        ]);
        DB::table('equipment')->insert([
            'name' => 'คอมพิวเตอร์',
            'label_button' => 'COMPUTER-',
            'description' => 'อุปกรณ์ที่เกี่ยวกับคอมพิวเตอร์',
            'created_at' => now(),
        ]);
        DB::table('equipment')->insert([
            'name' => 'แอร์',
            'label_button' => 'AIR-',
            'description' => 'อุปกรณ์ที่เกี่ยวกับแอร์ไม่ว่าจะเป็นรีโมทสายไฟที่เกี่ยวกับแอร์',
            'created_at' => now(),
        ]);
        DB::table('equipment')->insert([
            'name' => 'โปรเจ็คเตอร์',
            'label_button' => 'PROJECTER-',
            'description' => 'อุปกรณ์ที่เกี่ยวกับโปรเจ็คเตอร์ไม่ว่าจะเป็นรีโมท',
            'created_at' => now(),
        ]);
        DB::table('equipment')->insert([
            'name' => 'ที่สแกนนิ้วมือ',
            'label_button' => 'SCAN',
            'description' => 'อุปกรณ์ที่เกี่ยวกับสแกนนิ้วมือ',
            'created_at' => now(),
        ]);
    }
}
