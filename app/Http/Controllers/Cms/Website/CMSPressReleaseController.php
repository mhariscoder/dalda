<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSMediaCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSPressReleaseController extends Controller
{
    public function index()
    {
        $resultSet = CMSMediaCenter::where('type', 'press-releases')->get();
        return view('cms.website.media-center.press-release.index', compact('resultSet'));
    }

    public function addMediaCenter()
    {
        return view('cms.website.media-center.press-release.add');
    }

    public function addMediaCenterData()
    {
        request()->validate([
            'title' => ['required', 'max:55', 'unique:cms_media_center,title,NULL,id,type,press-releases'],
            'file' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            'description' => ['required','max:1000']
        ]);

        if (request()->hasFile('file')) {
            $img = Image::make(request()->file('file'));
            $extension = request()->file('file')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/media-center';
            $destination = getAbsolutePath() . '/assets/website/images/pages/media-center/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }
            $img->save($destination);
            CMSMediaCenter::create([
                'title' => request()->title,
                'type' => 'press-releases',
                'file' => $newFileName,
                'description' => request()->description,
            ]);
        }
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateMediaCenter($cmsMediaCenterId)
    {
        $updateMediaCenter = CMSMediaCenter::findOrFail($cmsMediaCenterId);
        return view('cms.website.media-center.press-release.update', compact('updateMediaCenter'));
    }

    public function updateMediaCenterData($cmsMediaCenterId)
    {
        $updateMediaCenter = CMSMediaCenter::findOrFail($cmsMediaCenterId);
        request()->validate([
            'title' => ['required', 'max:55', 'unique:cms_media_center,title,'.$cmsMediaCenterId.',id,type,press-releases'],
            'description' => ['required','max:1000']
        ]);

        $newFileName = $updateMediaCenter->file;

        if (!empty(request()->file('file'))) {
            request()->validate([
                'file' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/media-center/'.$updateMediaCenter->file;
            $path = getAbsolutePath().'/assets/website/images/pages/media-center';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }            $img = Image::make(request()->file('file'));
            $extension = request()->file('file')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$newFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }
        $updateMediaCenter->update([
            'title' => request()->title,
            'type' => 'press-releases',
            'file' => $newFileName,
            'description' => request()->description,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteMediaCenter($cmsMediaCenterId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateMediaCenter = CMSMediaCenter::find($cmsMediaCenterId);

        if (!empty($updateMediaCenter)) {
            \Illuminate\Support\Facades\File::delete(asset('/assets/website/images/pages/media-center/'.$updateMediaCenter->file));
            $updateMediaCenter->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
