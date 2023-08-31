<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transportations')->insert([
            'train_time' => '40分',
            'train_cost' => '5ユーロ程度',
            'train_content' => '乗客も少なく、車内もきれいで落ち着いています',
            'bus_time' => '30分',
            'bus_cost' => '10ユーロ程度',
            'bus_content' => 'Onnibusが有名です',
            'other_transportation_content' => 'タクシーなども利用可です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
