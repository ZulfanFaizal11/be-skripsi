<?php

namespace App\Http\Controllers;

use App\Models\Models\Lapangan;
use App\Models\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getLapanganOrder(Request $request)
    {
        try {
            $orderedLapangan = DB::table('order')
                ->join('users', 'order.id_user', '=', 'users.id_user')
                ->join('lapangan', 'lapangan.id_lapangan', '=', 'order.id_lapangan')
                ->select('id_order', 'lapangan.id_lapangan', 'nama_lapangan', 'email as email_pemesan', 'total_price', 'start_date', 'end_date')
                ->whereDate('start_date', $request->input('start_date'))
                ->where('lapangan.id_lapangan', $request->input('id_lapangan'))
                ->get();
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
