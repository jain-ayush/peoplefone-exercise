<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class UserController extends Controller
{
    public function index()
    {
        $userList = User::with('notifications')->get();
        return view('dashboard',['lists' => $userList]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-user', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required',
            'email'   => 'required|email',
            'phone_number'   => 'required|numeric|min:10',
        ]);
        $verifyNumber = $this->verifyNumber($request->phone_number);
        if($verifyNumber){
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->notification_switch = $request->notification_switch ?? '0';
            $user->update();
            return redirect('dashboard')->with('status','User Updated Successfully');
        }
        else{
            return redirect('dashboard')->with('status','Cannot Updated User');
        }

    }

    public function verifyNumber($number)
    {
        $sid = env('TWILLIO_SID');
        $token = env('TWILLIO_TOKEN');
        $number = '+91'.$number;
        $serviceId = 'VA11c5b9e274adb565f7ee8a5d17f84801';
        $twilio = new Client($sid, $token);
        try{
            $verification = $twilio->verify->v2->services("VA11c5b9e274adb565f7ee8a5d17f84801")
                                   ->verifications
                                   ->create("$number", "sms");

            if($verification->sid)
            {
                return true;
            }
            else{
                return false;
            }
        }
        catch(TwilioException $e){
            echo $e; exit;
        }
        
    }
}