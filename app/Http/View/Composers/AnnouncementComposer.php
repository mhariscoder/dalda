<?php


namespace App\Http\View\Composers;


use App\Models\CMSMediaCenter;
use Illuminate\View\View;

class AnnouncementComposer
{
    public function compose(View $view)
    {
        $view->with('announcements',CMSMediaCenter::where('type','test-dates')->latest()->get()->take(3));
    }
}