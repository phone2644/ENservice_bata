<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = ['id1' => 0, 'id2' => 0];
         //********************************************  Floor 1  ****************************************** */
         for ($i = 1; $i <= 16; $i++) {    
            $padded = $i < 10 ? '0' . $i : $i;
            DB::table('positions')->insert([
                'floor' => 1,
                'room' => 'EN1-1'.$padded,
                'repair' => 0,
                'status' => 1,
                'admin_room' => json_encode($data),
                'created_at' => now(),
            ]);
          }
         for ($i = 1; $i <= 7; $i++) {    
            $padded = $i < 10 ? '0' . $i : $i;
            DB::table('positions')->insert([
                'floor' => 2,
                'room' => 'EN1-2'.$padded,
                'repair' => 0,
                'status' => 1,
                'admin_room' => json_encode($data),
                'created_at' => now(),
            ]);
          }
         for ($i = 1; $i <= 10; $i++) {    
            $padded = $i < 10 ? '0' . $i : $i;
            DB::table('positions')->insert([
                'floor' => 3,
                'room' => 'EN1-3'.$padded,
                'repair' => 0,
                'status' => 1,
                'admin_room' => json_encode($data),
                'created_at' => now(),
            ]);
          }
         for ($i = 1; $i <= 11; $i++) {    
            $padded = $i < 10 ? '0' . $i : $i;
            DB::table('positions')->insert([
                'floor' => 4,
                'room' => 'EN1-4'.$padded,
                'repair' => 0,
                'status' => 1,
                'admin_room' => json_encode($data),
                'created_at' => now(),
            ]);
          }
         for ($i = 1; $i <= 27; $i++) {    
            $padded = $i < 10 ? '0' . $i : $i;
            DB::table('positions')->insert([
                'floor' => 5,
                'room' => 'EN1-5'.$padded,
                'repair' => 0,
                'status' => 1,
                'admin_room' => json_encode($data),
                'created_at' => now(),
            ]);
          }
        //  DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-102',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-103',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-104',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-105',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-106',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-107',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-108',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-109',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-110',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-111',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-112',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-113',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-114',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-115',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        // DB::table('positions')->insert([
        //     'floor' => 1,
        //     'room' => 'EN1-116',
        //     'repair' => 0,
        //     'status' => 1,
        //     'admin_room' => json_encode($data),
        //     'created_at' => now(),
        // ]);
        
        
//         //********************************************  Floor 2  ****************************************** */
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-201',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-202',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-203',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-204',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-205',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-206',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 2,
//             'room' => 'EN1-207',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);

//         //********************************************  Floor 3  ****************************************** */
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-301',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-302',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-303',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-304',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-305',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-306',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-307',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-308',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-309',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 3,
//             'room' => 'EN1-310',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         //********************************************  Floor 4  ****************************************** */
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-401',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-402',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-(1)402',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-(2)402',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-403',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-404',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-405',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-406',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-407',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//         DB::table('positions')->insert([
//             'floor' => 4,
//             'room' => 'EN1-408',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);
//           //********************************************  Floor 4  ****************************************** */
//           DB::table('positions')->insert([
//             'floor' => 5,
//             'room' => 'EN1-527',
//             'repair' => 0,
//             'status' => 1,
//             'admin_room' => json_encode($data),
//             'created_at' => now(),
//         ]);

    }
}
