<?php

namespace App\Http\Controllers\Dashboard;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $coupons = Coupon::get();
        return view('dashboard.coupon.index', compact('coupons'));
    }
    public function create()
    {
        $random_code = Str::random(10);
        return view('dashboard.coupon.create', compact('random_code'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->saveData(new Coupon());
        return redirect()->route('coupons.index');
    }

    public function edit(Coupon $coupon)
    {
        return view('dashboard.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     * @param Coupon $coupon
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Coupon $coupon)
    {
        $this->saveData($coupon);
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Coupon $coupon
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function validation()
    {
        return request()->validate([
            'code' => 'required',
            'discount' => 'required'
        ]);
    }
    private function saveData($coupon)
    {
        $this->validation();
        $coupon->code = request()->code;
        $coupon->discount = request()->discount;
        $coupon->save();
    }
}
