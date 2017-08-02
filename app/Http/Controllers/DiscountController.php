<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Discount;

class DiscountController extends Controller{

    public function createDiscount(Request $request){

        $discount = new Discount;

        $discount -> name = $request -> discount_name;
        $discount -> type = $request -> discount_type;
        $discount -> amount = $request -> discount_amount;
        $discount -> expDate = $request -> discount_exp;
        $discount -> applyTo = $request -> discount_apply;
        $discount -> uses = $request -> discount_uses;

        $discount -> save();
    }
}
