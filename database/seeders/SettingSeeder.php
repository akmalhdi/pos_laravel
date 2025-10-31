<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // elequent
        // query builder


        // contoh elequent
        Settings::create([
            'app_name' => 'Point Of Sales | PPKDJP',
            'address' => 'Jl Karet Baru',
            'phone_number' => '0899089898'
        ]);

        // contoh query builder
        // DB::table('settings')->create([]);
    }
}
