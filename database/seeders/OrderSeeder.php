<?php

namespace Database\Seeders;

use App\Enums\OrderStatusEnum;
use App\Models\Models\Lapangan;
use App\Models\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lapangan = Lapangan::first();
        Order::create([
            'id_order' => Str::uuid(),
            'id_lapangan' => $lapangan->id_lapangan,
            'start_date' => Carbon::create(2023, 9, 16, 15, 0, 0),
            'end_date' => Carbon::create(2023, 9, 16, 16, 0, 0),
            'total_price' => 20000,
            'status' => OrderStatusEnum::UNPAID,
        ]);
    }
}
