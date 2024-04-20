<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHallOfFame;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSHallOfFameController extends Controller
{
    public function index()
    {
        $resultSet = CMSHallOfFame::with('user')->latest()->get();
        return view('cms.website.media-center.hall-of-fame.index', compact('resultSet'));
    }

    public function addMediaCenter()
    {
        $students = User::where('student_id', '!=', NULL)->get();
        return view('cms.website.media-center.hall-of-fame.add', compact('students'));
    }

    public function addMediaCenterData()
    {
        request()->validate([
            'student_name' => ['required', 'max:55', 'unique:cms_hall_of_fames,user_id'],
            'file' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
        ]);

        $newFileName = null;
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
        }
        CMSHallOfFame::create([
            'user_id' => request()->student_name,
            'file' => $newFileName,
        ]);
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateMediaCenter($cmsMediaCenterId)
    {
        $students = User::where('student_id', '!=', NULL)->get();
        $updateMediaCenter = CMSHallOfFame::findOrFail($cmsMediaCenterId);
        return view('cms.website.media-center.hall-of-fame.update', compact('updateMediaCenter', 'students'));
    }

    public function updateMediaCenterData($cmsMediaCenterId)
    {
        $updateMediaCenter = CMSHallOfFame::findOrFail($cmsMediaCenterId);
        request()->validate([
            'student_name' => ['required', 'max:55', 'unique:cms_hall_of_fames,user_id,' . $cmsMediaCenterId],
        ]);

        $newFileName = $updateMediaCenter->file;

        if (!empty(request()->file('file'))) {
            request()->validate([
                'file' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/media-center/' . $updateMediaCenter->file;
            $path = getAbsolutePath() . '/assets/website/images/pages/media-center';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('file'));
            $extension = request()->file('file')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $newFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        $updateMediaCenter->update([
            'user_id' => request()->student_name,
            'file' => $newFileName,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteMediaCenter($cmsMediaCenterId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateMediaCenter = CMSHallOfFame::find($cmsMediaCenterId);

        if (!empty($updateMediaCenter)) {
            \Illuminate\Support\Facades\File::delete(asset('/assets/website/images/pages/media-center/' . $updateMediaCenter->file));
            $updateMediaCenter->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
