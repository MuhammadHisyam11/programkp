<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'hari' => 'Senin',
        ]);
        DB::table('days')->insert([
            'hari' => 'Selasa',
        ]);
        DB::table('days')->insert([
            'hari' => 'Rabu',
        ]);
        DB::table('days')->insert([
            'hari' => 'Kamis',
        ]);
        DB::table('days')->insert([
            'hari' => 'Jumat',
        ]);
        DB::table('days')->insert([
            'hari' => 'Sabtu',
        ]);
        DB::table('days')->insert([
            'hari' => 'Minggu',
        ]);
    }
}
