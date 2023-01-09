<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\WithdrawalApprovedNotification;
use App\Notifications\WithdrawalDeclinedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class WithdrawalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdrawals = Withdrawal::latest()->paginate(5);

        $data = [
            'withdrawals' => $withdrawals,
        ];

        return view('admin.debits')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return request();

        $withdrawal = Withdrawal::find($id);
        $user = User::find($withdrawal->user->id);

        $withdrawal->status = $request->input('status');
        $withdrawal->update();

        switch ($withdrawal->status) {
            case 1:
                Notification::send($user, new WithdrawalApprovedNotification($withdrawal));
                break;

            case 2:
                Notification::send($user, new WithdrawalDeclinedNotification($withdrawal));
                break;
        }

        return redirect()->route('debits.index')->with('success', 'Withdrawal successfuly updated');
    }

    /**
     * Toggle Cashout Day.
     *
     * @return \Illuminate\Http\Response
     */
    public function toggle()
    {
        $settings = Setting::first();

        if (count(request()->all()) > 2) {
            return redirect()->route('debits.index')->with('error', 'Select only one at a time');
        }

        if (request()->exists('cashout_day')) {
            $settings->cashout_day = 1;
            $settings->referral_cashout_day = 0;
        }

        if (request()->exists('referral_day')) {
            $settings->referral_cashout_day = 1;
            $settings->cashout_day = 0;
        }

        if (request()->exists('close_cashout')) {
            $settings->cashout_day = 0;
            $settings->referral_cashout_day = 0;
        }

        $settings->update();

        return redirect()->route('debits.index')->with('success', 'Cashouts set accordingly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return request();

        $withdrawal = Withdrawal::find($id);
        $withdrawal->delete();

        return redirect()->route('debits.index')->with('success', 'Withdrawal deleted successfuly');
    }
}
