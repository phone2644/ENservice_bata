<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('problems')->insert([
            'topic' => 'อุปกรณ์ถูกลบแล้ว',
            'problem' => 'ไม่มีข้อมูลนี้แล้ว....',
            'equipment_id' => 1,
            'created_at' => now(),
           

        ]);
        DB::table('problems')->insert([
            'topic' => 'ยังไม่ได้ระบุข้อมูล',
            'problem' => 'โปรดระบุค่า....',
            'equipment_id' => 5,
            'created_at' => now(),
           

        ]);
        DB::table('problems')->insert([
            'topic' => 'หน้าจอเสีย',
            'problem' => 'ไฟกระพริบไม่สามารถเปิดได้',
            'equipment_id' => 2,
            'created_at' => now(),
           

        ]);
        DB::table('problems')->insert([
            'topic' => 'แอร์เปิดไม่ได้',
            'problem' => 'ไม่สามารถเปิดได้',
            'equipment_id' => 3,
            'created_at' => now(),
           

        ]);
        DB::table('problems')->insert([
            'topic' => 'โปรเจ็คเตอร์เปิดไม่ได้',
            'problem' => 'ไม่สามารถเปิดได้',
            'equipment_id' => 4,
            'created_at' => now(),
           

        ]);
        DB::table('problems')->insert([
            'topic' => 'อุปกรณ์ไม่ครบ',
            'problem' => 'อุปกรณ์ขาดหายเช่น เมาส์,คีย์บอร์ด,หน้าจอ,อื่นๆ',
            'equipment_id' => 2,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'อุปกรณ์ขาดหายทางสายไฟ',
            'problem' => 'อุปกรณ์ขาดหายหรือชำรุด เช่น สายแลน,สายไฟคอมพิวเตอร์,อื่นๆ',
            'equipment_id' => 2,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'ปัญหาระบบภายใน',
            'problem' => 'ระบบภายในคอมพิวเตอร์ไม่สามารถใช้ซอฟต์แวร์บางอย่างได้ เช่น เข้าอินเตอร์เน็ตไม่ได้,windownช้า,โปรแกรมขาดหาย,อื่นๆ',
            'equipment_id' => 2,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'แอร์ไม่เย็น',
            'problem' => 'สามารถเปิดแอร์ได้ตามปกติแต่ ไม่มีความเย็น',
            'equipment_id' => 3,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'รีโมทแอร์มีปัญหา',
            'problem' => 'รีโมทชุดรุดหรือขวบคุมแอร์ไม่ได้',
            'equipment_id' => 3,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'ล้างแอร์',
            'problem' => 'ล้างระบบแอร์',
            'equipment_id' => 3,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'สีเพี้ยน',
            'problem' => 'โปรเจ็คเตอร์มีสีที่ไม่ตรงกับภาพ',
            'equipment_id' => 4,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'ชิ้นส่วนขาดหายหรือชุดรุด',
            'problem' => 'โปรเจ็คเตอร์เกิดเสียหาย',
            'equipment_id' => 4,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'ระบบภายในมีปัญหา',
            'problem' => 'ปัญฆาภายในโปรเจ็คเตอร์ที่ไม่สามารถใช้งานได้อย่างเต็มประสิทธภาพได้',
            'equipment_id' => 4,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'สแกนนิ้วติดยาก',
            'problem' => 'สแกนนิ้วไม่ได้หรือสแกนยาก',
            'equipment_id' => 5,
            'created_at' => now(),
        ]);
        DB::table('problems')->insert([
            'topic' => 'เครื่องสแกนไม่ทำงาน',
            'problem' => 'สแกนนิ้วทำงานไม่ได้',
            'equipment_id' => 5,
            'created_at' => now(),
        ]);
    }
}
