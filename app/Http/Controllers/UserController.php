<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        $userList = User::with('notifications')->get();
        return view('dashboard',['lists' => $userList]);
    }

    function edit($id)
    {
        $user = User::find($id);
        return view('edit-user', ['user' => $user]);
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->notification_switch = $request->notification_switch ?? '0';
        $user->update();
        return redirect('dashboard')->with('status','User Updated Successfully');
        // return view('edit-user', ['user' => $user]);
    }
}
