<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * Show all the users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $data = [
            'users' => User::where('type', 0)->paginate(10),
        ];

        return view('admin.users', $data);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_user($id)
    {
        // return $id;

        $user = User::find($id);
        $user->delete();

        return redirect('/controls')->with('success', 'User deleted successfuly');
    }
}
