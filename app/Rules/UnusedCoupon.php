<?php

namespace App\Rules;

use App\Models\Coupon;
use Illuminate\Contracts\Validation\InvokableRule;

class UnusedCoupon implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $coupon = Coupon::where('code', $value)->first();

        if ($coupon->user_id != null) {
            $fail('The coupon code is already used!');
        }
    }
}
