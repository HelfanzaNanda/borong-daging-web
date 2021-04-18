<?php

namespace App\Http\Controllers\Voucher;

use App\User;
use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    public function index()
    {
        $userId = Session::get('_id');
        $vouchers = Coupons::all();
        $dateNow = now()->toDateString();
        
        return view('voucher.index', [
            'vouchers' => $vouchers,
            'user' => User::where('id', $userId)->first(),
            'dateNow' => $dateNow
        ]);
    }

    public function useVoucher($code)
    {
        $voucher = Coupons::where('code', $code)
        ->where('enabled', true)
        ->whereDate('expires_at', '>=', now())->first();
        if ($voucher) {
            $data['code'] = $voucher->code;
            $data['discount'] = $voucher->discount;
            return response()->json([
                'message' => 'success',
                'status' => true,
                'data' => $data
            ]);
        }else{
            return response()->json([
                'message' => 'kode vocher sudah kadaluarsa atau sudah pernah digunakan',
                'status' => false,
            ]);
        }
    }
}
