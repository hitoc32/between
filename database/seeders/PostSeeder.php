<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id'=> '1',
            'nation_id' => '71',
            'airport' => 'ヘルシンキ・ヴァンター空港',
            'airport_sf' => 'HEL',
            'region' => 'ヴァンター',
            'basic_content' => 'ヘルシンキ空港はフィンランド最大の空港です。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
