<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Pastikan baris ini ada untuk memanggil "DB"

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan DB::table, BUKAN Setting::table
        DB::table('settings')->truncate();

        // Gunakan DB::table, BUKAN Setting::table
        DB::table('settings')->insert([
            'company_name' => 'PT Perusahaan Default',
            'app_name' => 'Aplikasi Kasir',
            'logo_path' => null,
            'address' => 'Jl. Contoh Alamat No. 123, Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
