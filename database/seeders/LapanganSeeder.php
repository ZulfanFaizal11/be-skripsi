<?php

namespace Database\Seeders;

use App\Models\Models\Lapangan;
use Illuminate\Database\Seeder;

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
            'nama_lapangan' => 'Lapangan 1',
            'price' => 20000
        ]);

        Lapangan::create([
            'nama_lapangan' => 'Lapangan 2',
            'price' => 30000
        ]);
    }
}
