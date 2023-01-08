<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $data = [
            'is_new_user' => $user->created_at->diffInDays(Carbon::now()) == 0,
        ];

        return view('dash.home', $data);
    }

    /**
     * Show the application referrals page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function referrals()
    {
        return view('dash.referral');
    }

    /**
     * Show the application profile page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('dash.profile');
    }

    /**
     * Show the application wallet page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function wallet()
    {
        return view('dash.wallet');
    }
}
