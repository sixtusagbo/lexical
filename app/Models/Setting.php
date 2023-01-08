<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'app_name',
        'email',
        'admin_email',
        'facebook',
        'twitter',
        'instagram',
        'whatsapp',
        'currency',
        'cashout_day',
        'referral_cashout_day',
        'referral_worth',
        'welcome_bonus',
        'sponsored_post',
        'daily_login_bonus',
        'withdrawal_charge',
    ];
}
