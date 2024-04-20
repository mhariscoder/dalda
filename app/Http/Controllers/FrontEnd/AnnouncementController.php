<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use App\Models\UploadDocument;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = CMSMediaCenter::where('type', 'test-dates')->paginate(3);
        return view('frontend.announcement', compact('announcements'));
    }

    public function loadMore()
    {
        $announcements = CMSMediaCenter::where('type', 'test-dates')->paginate(3);
        if(request()->has('page'))
        {
            return view('partials.frontend.announcement', compact('announcements'))->render();
        }
        return response()->json(['msg' => 'Something went wrong!'],400);
    }
}
