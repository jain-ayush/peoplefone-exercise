<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function insertForm()
    {
        $userList = User::where('notification_switch',1)->get();
        return view('add-notification',['user_lists' => $userList]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'type'   => 'required',
            'description'   => 'required',
            'expiry_date'   => 'required',
            'destination'   => 'required',
        ]);
        try {
            if($request->destination == 'select_all') {

                $userList = User::where('notification_switch',1)->pluck('id')->toArray();
                foreach($userList as $key=>$value)
                {
                    $notification = new Notification();
                    $notification->type = $request->type;
                    $notification->description = $request->description;
                    $notification->expiry_date = $request->expiry_date;
                    $notification->destination = $value;
                    $notification->status = 0;
                    $notification->save();
                }
            } else {
                $notification = new Notification();
                $notification->type = $request->type;
                $notification->description = $request->description;
                $notification->expiry_date = $request->expiry_date;
                $notification->destination = $request->destination;
                $notification->status = 0;
                $notification->save();
            }
        } catch (\Throwable $th) {
            return redirect()->route('listNotifications')->withErrors('Notifications');
        }        
        return redirect()->route('listNotifications')->withSuccess('Notifications Added Successfully');
    }

    public function list()
    {
        // dd(\Carbon\Carbon::now());
        $notifications = Notification::where('expiry_date','>', \Carbon\Carbon::now())->with('user')->get();
        return view('list_notifications',['notifications_list' => $notifications]);
    }

    public function view($id)
    {
        $userNotifications = User::where('id',$id)->with(['notifications'=> function($query){
            $query->where('expiry_date','>', \Carbon\Carbon::now());
        },'unread_notifications'=> function($query){
            $query->where('expiry_date','>', \Carbon\Carbon::now());
        }])->first();
        return view('view-notification',['user_notifications' => $userNotifications]);
    }

    public function changeStatus(Request $request)
    {
        $changeStatus = Notification::where('id',$request->notificationId)->update(['status'=>1]);
        if($changeStatus){
           return "success";
        }
    }   

}
