<?php

namespace App\Http\Controllers;

use App\Models\Models\Lapangan;
use App\Models\Models\Order;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function getAllLapangan()
    {
        try {
            $lapangans = Lapangan::all();
            return response()->json([
                'message' => 'Successfully get all lapangan!',
                'data' => $lapangans,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed get all lapangan!',
                'error' => $e->getMessage(),
            ], 401);
        };
    }

    public function getLapanganOrderd()
    {
        try {
            $orderedLapangan = Order::all();
            return response()->json([
                'message' => 'Successfully get ordered lapangan!',
                'data' => $orderedLapangan,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed get ordered lapangan!',
                'error' => $e->getMessage(),
            ], 401);
        };
    }
}
