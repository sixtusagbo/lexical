<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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

        $id = auth()->user()->id; // user id whose image wil be added
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

        $id = auth()->user()->id; // user id whose image wil be added
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

        $id = auth()->user()->id; // user id whose image wil be added
        $user = User::find($id);

        $user->password = Hash::make($values['password']);
        $user->update();

        return redirect()->route('profile')->with('success', 'Profile image updated successfully!');
    }
}
