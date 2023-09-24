<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Border_controlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('border_controls')->insert([
            'post_id' => '1',
            'arrive_level' => '1',
            'arrive_content' => 'とてもやさしいです',
            'depature_level' => '2',
            'depature_content' => '一度だけフィンランド語対応だったことがあります',
            'luggage_time' => '10',
            'luggage_content' => '最新機器によりペットボトルも持ち込み可です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
