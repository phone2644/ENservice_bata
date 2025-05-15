<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priorities')->insert([
            'topic'=>'ไม่ได้กำหนดความสำคัญ',
            'time'=>'ไม่กำหนดเวลา',
            'usertype'=>'0',
            'color'=>'#070108',
            'description'=>'เคสที่ยังไม่ได้กำหนดความสำคัญ',
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'topic'=>'ไม่สำคัญ',
            'time'=>'เวลาประมาณ 15-30 วัน',
            'usertype'=>'0',
            'color'=>'#b8b2b2',
            'description'=>'เคสที่ยังไม่ได้กำหนดความสำคัญ',
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'topic'=>'ปิกติ',
            'time'=>'เวลาประมาณ 7-15 วัน',
            'usertype'=>'1',
            'color'=>'#b6f5f3',
            'description'=>'เคสที่ยังไม่ได้สำคัญ',
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'topic'=>'ด่วน',
            'time'=>'เวลาประมาณ 3-5 วัน',
            'usertype'=>'1',
            'color'=>'#35fa66',
            'description'=>'เคสประเด็นปัญหาปกติ',
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'topic'=>'ด่วนมาก',
            'time'=>'เวลาประมาณ 1-3 วัน',
            'usertype'=>'1',
            'color'=>'#edb347',
            'description'=>'เคสเร่งด่วนมาก',
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'topic'=>'ด่วนที่สุด',
            'time'=>'ภายในวันนี้',
            'usertype'=>'1',
            'color'=>'#f2e935',
            'description'=>'เคสเร่งด่วนมาก',
            'created_at' => now(),
        ]);
        DB::table('priorities')->insert([
            'topic'=>'ด่วนที่สุด',
            'time'=>'มาทันทีที่พบการแจ้งซ่อม',
            'usertype'=>'1',
            'color'=>'#ed1333',
            'description'=>'เคสที่มีความสำคัญต้องแก้ไขเร่งด่วนทันที',
            'created_at' => now(),
        ]);
    }
}
