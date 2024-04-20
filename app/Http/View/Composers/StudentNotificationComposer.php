<?php


namespace App\Http\View\Composers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentNotificationComposer
{
    public function compose(View $view)
    {
        $view->with('student_notifications', Notification::with('getUser')->whereIn('type',['status-apply','status-claim','test-result-uploaded'])->where('user_id',Auth::id())->where('is_read',0)->latest()->get());
    }
}