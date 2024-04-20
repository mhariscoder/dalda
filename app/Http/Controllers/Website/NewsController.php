<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = CMSMediaCenter::where('type','news')->latest()->get()->take(6);
        return view('website.media.news.index',compact('news'));
    }

    public function newsDetail($id)
    {
        $news = CMSMediaCenter::where('id',$id)->firstOrFail();
        return view('website.media.news.detail',compact('news'));
    }
}
