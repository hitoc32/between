<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'store_content' => 'チェーン店からフィンランドデザインの店まで幅広いラインナップです',
            'wifi_content' => '時間制限なしのWi-Fiがあります',
            'toilet_content' => 'とてもきれいで、ペットボトルに給水も可能です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
