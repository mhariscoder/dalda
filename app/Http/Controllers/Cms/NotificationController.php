<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:notification-list');
    }

    public function index(){
        $notifications = Notification::latest()->get();
        foreach ($notifications as $val){
            $val->update([
                'is_read' => 1
            ]);
        }
        return view('cms.notifications.index',compact('notifications'));
    }

    public function deleteNotification($notificationId){
        $msg = "Something went wrong.";
        $code = 400;
        $notification = Notification::findOrFail($notificationId);

        if (!empty($notification)) {
            $notification->delete();
            $msg = "Successfully Removed!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }

    public function detailNotification($notificationId){
        $notify = Notification::where('id',$notificationId)->first();

        $notify->update([
           'is_read' => 1,
        ]);

        session()->forget('notification');

        if($notify->type === "apply"){
            return redirect('/admin/apply-for-scoloarships')->with('notification',$notify);
        } else {
            return redirect('/admin/claim-for-scoloarships')->with('notification',$notify);
        }
    }
}
