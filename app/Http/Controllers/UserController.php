<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * User Actions
 */
class UserController extends Controller
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
     * Update the user's profile_image field in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function uploadProfileImage(Request $request)
    {
        // return 123; //? test case

        $this->validate($request, [
            'profile_image' => 'image|required',
        ]);

        $id = auth()->user()->id; // id of logged in user
        $user = User::find($id);

        if ($user->profile_image != 'no_profile_image.png') {
            Storage::delete('public/images/profile/' . $user->profile_image);
        }

        if ($request->hasFile('profile_image')) {
            // upload image to server and save name to database
            $fileExtension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $fileExtension;

            $request->file('profile_image')->storeAs('public/images/profile/', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_profile_image.png';
        }

        $user->profile_image = $fileNameToStore;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile image updated successfully!');
    }

    /**
     * Update the user's bio data in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function updateBioData(Request $request)
    {
        // return 123; //? test case

        $values = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'min:10'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);

        $id = auth()->user()->id; // id of logged in user
        $user = User::find($id);

        $user->first_name = $values['first_name'];
        $user->last_name = $values['last_name'];
        $user->phone_number = $values['phone_number'];
        $user->state = $values['state'];
        $user->country = $values['country'];
        $user->update();

        return redirect()->route('profile')->with('success', 'Profile image updated successfully!');
    }

    /**
     * Update the user's password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function updateUserPassword(Request $request)
    {
        // return 123; //? test case

        $values = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $id = auth()->user()->id; // id of logged in user
        $user = User::find($id);

        $user->password = Hash::make($values['password']);
        $user->update();

        return redirect()->route('profile')->with('success', 'Profile image updated successfully!');
    }

    /**
     * Store referral cashout request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function referralCashout(Request $request)
    {
        // return 123; //? test case

        $values = $request->validate([
            'amount' => ['required'],
            'bank_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'numeric', 'min_digits:10'],
        ]);

        // Current user
        $user = auth()->user();

        // Create new withdrawal request
        $withdrawal = new Withdrawal();
        $withdrawal->type = 'referral';
        $withdrawal->amount = $values['amount'];
        $withdrawal->acc_name = $user->full_name;
        $withdrawal->bank = $values['bank_name'];
        $withdrawal->acc_num = $values['account_number'];
        $withdrawal->user_id = $user->id;
        $withdrawal->save();

        // Update the amount of referral money the person has
        $id = auth()->user()->id; // id of logged in user
        $user = User::find($id);
        $user->referral_earnings -= $values['amount'];
        $user->update();

        return redirect()->route('wallet')->with('success', 'Cash out placed successfully!');
    }

    /**
     * Store task cashout request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function taskCashout(Request $request)
    {
        // return 123; //? test case

        $values = $request->validate([
            'amount' => ['required'],
            'bank_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'numeric', 'min_digits:10'],
        ]);

        // Current user
        $user = auth()->user();

        // Create new withdrawal request
        $withdrawal = new Withdrawal();
        $withdrawal->type = 'task';
        $withdrawal->amount = $values['amount'];
        $withdrawal->acc_name = $user->full_name;
        $withdrawal->bank = $values['bank_name'];
        $withdrawal->acc_num = $values['account_number'];
        $withdrawal->user_id = $user->id;
        $withdrawal->save();

        // Update the amount of referral money the person has
        $id = auth()->user()->id; // id of logged in user
        $user = User::find($id);
        $user->task_earnings -= $values['amount'];
        $user->update();

        return redirect()->route('wallet')->with('success', 'Cash out placed successfully!');
    }
}
