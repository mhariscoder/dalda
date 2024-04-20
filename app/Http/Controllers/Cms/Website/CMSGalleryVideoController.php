<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAgriculture;
use App\Models\CMSHealth;
use App\Models\CMSHospital;
use App\Models\CMSVideo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CMSGalleryVideoController extends Controller
{
    public function index()
    {
        $galleryVideos = CMSVideo::latest()->get();
        $cmsHealth = CMSHealth::first();
        return view('cms.website.gallery.video.index', compact('galleryVideos'));
    }

    public function addVideoList()
    {
        $categories = CMSVideo::CATEGORIES;
        return view('cms.website.gallery.video.add', compact('categories'));
    }

    public function addVideoListData()
    {
        $rules = [
            'category' => 'required|in:' . implode(',', CMSVideo::CATEGORIES),
            'video_file' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt|max:40960',
        ];
        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $modelName = 'App\Models\CMS'.request()->category;
        $relation = '';
        $file = request()->file('video_file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $path = '/assets/website/videos/';
        $originalPath = getAbsolutePath() . '/assets/website/videos/';
        if (!File::isDirectory($originalPath)) {
            File::makeDirectory($originalPath, 0777, true, true);
        }
        $file->move($originalPath, $fileName);
        $model = $modelName::first();
        $model->getVideos()->create(['video_name' => $fileName, 'path' => $path]);

        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateVideoList($galleryVideoId)
    {
        $cmsVideo = CMSVideo::where('id', $galleryVideoId)->first();
        // $model = CMSVideo::whereHasMorph('getVideoTable',[CMSAgriculture::class, CMSHospital::class])->get();
        // $cmsVideo = $model->where('id', $galleryVideoId)->first();
        // if(empty($cmsVideo))
        // {
        //     $cmsVideo = CMSVideo::where('id', $galleryVideoId)->first();
        // }
        $categories = CMSVideo::CATEGORIES;
        // $agricultures = CMSAgriculture::select(['id', 'university_name'])->get();
        // $hospitals = CMSHospital::select(['id', 'hospital_name'])->get();
        return view('cms.website.gallery.video.update', compact('cmsVideo', 'categories'));
    }

    public function updateVideoListData($galleryVideoId)
    {
        $cmsVideo = CMSVideo::where('id', $galleryVideoId)->first();

        if(empty($cmsVideo)){
            return response()->json(['error' => 'Something went wrong!'],422);
        }

        $modelName = 'App\Models\CMS'.request()->category;
        $rules['category'] = 'required|in:' . implode(',', CMSVideo::CATEGORIES);
        $rules['video_file'] = 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt|max:40960|unique:cms_gallery_videos,video_name,'.$galleryVideoId;

        // request()['modified_videoable_id'] = null;

        // if(in_array(request()->category, ['Agriculture', 'Hospital'])){
        //     $ruleKey = request()->category === 'Agriculture' ? 'university_name' : 'hospital_name';
        //     $rules[$ruleKey] = 'required|in:' . implode(',', $modelName::pluck('id')->toArray());
        //     request()['modified_videoable_id'] = !empty(request()->university_name)?request()->university_name:request()->hospital_name;
        // }

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $path = '/assets/website/videos/';
        $modelName = 'App\Models\CMS'.request()->category;
        $fileName = $cmsVideo->video_name;
        if(isset(request()->video_file)){
            $file = request()->file('video_file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $originalPath = getAbsolutePath() . '/assets/website/videos/';
            if (!File::isDirectory($originalPath)) {
                File::makeDirectory($originalPath, 0777, true, true);
            }
            if(file_exists($originalPath.'/'.$cmsVideo->video_name)){
                File::delete($originalPath.'/'.$cmsVideo->video_name);
            }
            $file->move($originalPath, $fileName);
        }
        $model = $modelName::first();
        $cmsVideo->update([
            'video_name' => $fileName,
            'videoable_id' =>  $model->id,
            'videoable_type'=> request()->category,
            'path' => $path,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteVideoList($galleryVideoId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateVideo = CMSVideo::find($galleryVideoId);
        if (!empty($updateVideo)) {
            if(file_exists(getAbsolutePath().$updateVideo->path.'/'.$updateVideo->video_name)){
                File::delete(getAbsolutePath().$updateVideo->path.'/'.$updateVideo->video_name);
            }
            $updateVideo->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
