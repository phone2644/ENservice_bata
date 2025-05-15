<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'ผบตร. สุรเพชร นิวงษา',
            'email'=>'zxcv1234@gmail.com',
            'usertype'=>'1',
            'password'=>bcrypt('x0821028504x'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'อาจารย์คนที่1',
            'email'=>'teacher1@npu.ac.th',
            'usertype'=>'1',
            'password'=>bcrypt('cpe123456'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'อาจารย์คนที่2',
            'email'=>'teacher2@npu.ac.th',
            'usertype'=>'1',
            'password'=>bcrypt('cpe123456'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'อาจารย์คนที่3',
            'email'=>'teacher3@npu.ac.th',
            'usertype'=>'1',
            'password'=>bcrypt('cpe123456'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'เจ้าหน้าที่ระดับสูง',
            'email'=>'nicklove115533@npu.ac.th',
            'usertype'=>'2',
            'password'=>bcrypt('x0821028504x'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'เจ้าหน้าที่ระดับสูง',
            'email'=>'admin1@npu.ac.th',
            'usertype'=>'2',
            'password'=>bcrypt('cpe123456'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'เจ้าหน้าที่ระดับสูง',
            'email'=>'admin2@npu.ac.th',
            'usertype'=>'2',
            'password'=>bcrypt('cpe123456'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name'=>'นักศึกษาหมายเลขที่ 1',
            'email'=>'633110310057@npu.ac.th',
            'usertype'=>'0',
            'password'=>bcrypt('x0821028504x'),
            'created_at' => now(),
        ]);
    }
}
