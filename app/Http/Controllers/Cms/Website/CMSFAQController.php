<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSFAQController extends Controller
{
    public function index()
    {
        $resultSet = CMSMediaCenter::where('type', 'faq')->get();
        return view('cms.website.faq.index', compact('resultSet'));
    }

    public function addMediaCenter()
    {
        return view('cms.website.faq.add');
    }

    public function addMediaCenterData()
    {
        request()->validate([
            'title' => ['required', 'max:55', 'unique:cms_media_center,title,NULL,id,type,faq'],
            'description' => ['required', 'max:1000']
        ]);

        CMSMediaCenter::create([
            'title' => request()->title,
            'type' => 'faq',
            'description' => request()->description,
        ]);
        return redirect('/admin/pages/faq')->with('success', 'Successfully added.');
    }

    public function updateMediaCenter($cmsMediaCenterId)
    {
        $updateMediaCenter = CMSMediaCenter::findOrFail($cmsMediaCenterId);
        return view('cms.website.faq.update', compact('updateMediaCenter'));
    }

    public function updateMediaCenterData($cmsMediaCenterId)
    {
        $updateMediaCenter = CMSMediaCenter::findOrFail($cmsMediaCenterId);
        request()->validate([
            'title' => ['required', 'max:55', 'unique:cms_media_center,title,'.$cmsMediaCenterId.',id,type,faq'],
            'description' => ['required', 'max:1000']
        ]);

        $updateMediaCenter->update([
            'title' => request()->title,
            'type' => 'faq',
            'description' => request()->description,
        ]);
        return redirect('/admin/pages/faq')->with('success', 'Successfully updated.');
    }

    public function deleteMediaCenter($cmsMediaCenterId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateMediaCenter = CMSMediaCenter::find($cmsMediaCenterId);

        if (!empty($updateMediaCenter)) {
            $updateMediaCenter->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
