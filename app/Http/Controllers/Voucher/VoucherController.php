<?php

namespace App\Http\Controllers\Voucher;

use App\User;
use App\Models\Coupons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CouponHistories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        $user_id = Session::get('_id');
        $voucher = Coupons::where('code', $code)->whereDate('expires_at', '>=', now())->first();
        if (!$voucher) {
            return response()->json([
                'message' => 'kode vocher sudah kadaluarsa',
                'status' => false,
            ]);
        }
        $voucher_history = CouponHistories::where('user_id', $user_id)->where('coupon_code', $code)->first();
        if ($voucher_history) {
            return response()->json([
                'message' => 'kode vocher sudah pernah di gunakan',
                'status' => false,
            ]);
        }
        $data['code'] = $voucher->code;
        $data['discount'] = $voucher->discount;
        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $data
        ]);
    }
}
