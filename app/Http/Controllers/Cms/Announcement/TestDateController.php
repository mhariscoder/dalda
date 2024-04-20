<?php

namespace App\Http\Controllers\Cms\Announcement;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TestDateController extends Controller
{
    public function index()
    {
        $testDates = CMSMediaCenter::where('type','test-dates')->latest()->get();
        return view('cms.announcement.test-dates.index', compact('testDates'));
    }

    public function addTestDate()
    {
        return view('cms.announcement.test-dates.add');
    }

    public function addTestDateData()
    {
        request()->validate([
            'title' => ['required', 'max:55', 'unique:cms_media_center,title,NULL,id,type,test-dates'],
            'description' => 'required'
        ]);

        if(str_word_count(request()->description) > 350){
            return back()->withErrors(['error'=>'description has more than 350 words.'])->withInput();
        }

        CMSMediaCenter::create([
            'title' => request()->title,
            'type' => 'test-dates',
            'description' => request()->description
        ]);

        return redirect('/admin/test-dates')->with('success','Successfully added.');
    }

    public function updateTest($cmsMediaCenterId)
    {


        $news = CMSMediaCenter::where('id',$cmsMediaCenterId)->where('type','test-dates')->first();
        //dd($news);


        return view('cms.announcement.test-dates.update',compact('news'));
    }

    public function updateTestDate($cmsMediaCenterId)
    {
        $news = CMSMediaCenter::where('id',$cmsMediaCenterId)->where('type','test-dates')->first();
        // dd('asd');

        request()->validate([
            'title' => ['required', 'max:55', Rule::unique('cms_media_center')->ignore($news->id)],
            'description' => 'required'
        ]);
        if(str_word_count(request()->description) > 350){
            return back()->withErrors(['error'=>'description has more than 350 words.'])->withInput();
        }

        $news->update([
            'title' => request()->title,
            'type' => 'test-dates',
            'description' => request()->description
        ]);
        return redirect('/admin/test-dates')->with('success','Successfully updated.');
    }

    public function deleteTestDate($cmsMediaCenterId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = CMSMediaCenter::findOrFail($cmsMediaCenterId);

        if (!empty($upload)) {
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
