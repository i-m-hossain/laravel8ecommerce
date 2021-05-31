<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponComponent extends Component
{
    public function deleteCoupon($coupon_id){
        Coupon::find($coupon_id)->delete();
        session()->flash('message', 'The product is deleted successfully');
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupon-component', ['coupons'=>$coupons])->layout('layouts.base');
    }
}
