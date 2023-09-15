<?php

namespace Database\Seeders;

use App\Models\Models\Lapangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LapanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lapangan::create([
            'id_lapangan' => Str::uuid(),
            'nama_lapangan' => 'Lapangan 1',
            'price' => 20000
        ]);

        Lapangan::create([
            'id_lapangan' => Str::uuid(),
            'nama_lapangan' => 'Lapangan 2',
            'price' => 30000
        ]);
    }
}
