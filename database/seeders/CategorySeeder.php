<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => '出入国検査',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('categories')->insert([
            'category' => '空港内施設（Wi-Fi・トイレ含む）',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
       
        DB::table('categories')->insert([
            'category' => 'アクセス',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('categories')->insert([
            'category' => 'その他',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
