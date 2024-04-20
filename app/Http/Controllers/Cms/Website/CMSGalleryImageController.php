<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSAgriculture;
use App\Models\CMSEducation;
use App\Models\CMSHospital;
use App\Models\CMSImage;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CMSGalleryImageController extends Controller
{
    public function index()
    {
        $galleryImages = CMSImage::latest()->get();
        return view('cms.website.gallery.image.index', compact('galleryImages'));
    }

    public function addImageList()
    {
        $categories = CMSImage::CATEGORIES;
        return view('cms.website.gallery.image.add', compact('categories'));
    }

    public function addImageListData()
    {
        $rules = [
            'category' => 'required|in:' . implode(',', CMSImage::CATEGORIES),
            'image_file' => 'required|image|mimes:jpg,jpeg,png|max:10240|unique:cms_gallery_images,image_name',
        ];

        // if (in_array(request()->category, ['Agriculture', 'Hospital'])) {
        //     $modelName = 'App\Models\CMS' . request()->category;
        //     $ruleKey = request()->category === 'Agriculture' ? 'university_name' : 'hospital_name';
        //     $rules[$ruleKey] = 'required|in:' . implode(',', $modelName::pluck('id')->toArray());
        //     $id = empty(request()->hospital_name) ? request()->university_name : request()->hospital_name;
        //     $relation = $modelName::find((int)$id);
        // } elseif(request()->category == 'Education / Scholarship') {
        //     $rules['institute_name'] = 'required|in:' . implode(',', CMSEducation::pluck('id')->toArray());
        //     $relation = CMSEducation::find((int)request()->institute_name);
        // }


        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $modelName = 'App\Models\CMS'.request()->category;
        $relation = '';
        $file = request()->file('image_file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $path = '/assets/website/images/';
        $originalPath = getAbsolutePath() . '/assets/website/images/';
        if (!File::isDirectory($originalPath)) {
            File::makeDirectory($originalPath, 0777, true, true);
        }
        $file->move($originalPath, $fileName);
        $model = $modelName::first();
        $model->getImages()->create(['image_name' => $fileName, 'path' => $path]);

        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateImageList($galleryImageId)
    {
        $cmsImage = CMSImage::where('id', $galleryImageId)->first();
        $categories = CMSImage::CATEGORIES;
        // $agricultures = CMSAgriculture::select(['id', 'university_name'])->get();
        // $hospitals = CMSHospital::select(['id', 'hospital_name'])->get();
        // $institutes = CMSEducation::select(['id', 'institute_name'])->get();
        return view('cms.website.gallery.image.update', compact('cmsImage', 'categories'));
    }

    public function updateImageListData($galleryImageId)
    {
        $cmsImage = CMSImage::where('id', $galleryImageId)->first();
        if (empty($cmsImage)) {
            return response()->json(['msg' => 'Something went wrong!']);
        }
        if (empty($cmsImage->image_name)) {
            $rules['image_file'] = 'required|image|mimes:jpg,jpeg,png|max:10240|unique:cms_gallery_images,image_name,' . $galleryImageId;
        }

        $modelName = 'App\Models\CMS' . request()->category;
        $rules['category'] = 'required|in:' . implode(',', CMSImage::CATEGORIES);

        // if (in_array(request()->category, ['Agriculture', 'Hospital'])) {
        //     $ruleKey = request()->category === 'Agriculture' ? 'university_name' : 'hospital_name';
        //     $rules[$ruleKey] = 'required|in:' . implode(',', $modelName::pluck('id')->toArray());
        //     request()['modified_imageable_id'] = !empty(request()->university_name) ? request()->university_name : request()->hospital_name;
        // } elseif(request()->category == 'Education / Scholarship') {
        //     $rules['institute_name'] = 'required|in:' . implode(',', CMSEducation::pluck('id')->toArray());
        //     request()['modified_imageable_id'] = request()->institute_name;
        // }

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $path = '/assets/website/images/';
        $modelName = 'App\Models\CMS'.request()->category;
        $fileName = $cmsImage->image_name;
        if(isset(request()->image_file)){
            $file = request()->file('image_file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $originalPath = getAbsolutePath() . '/assets/website/images/';
            if (!File::isDirectory($originalPath)) {
                File::makeDirectory($originalPath, 0777, true, true);
            }
            if(file_exists($originalPath.'/'.$cmsImage->image_name)){
                File::delete($originalPath.'/'.$cmsImage->image_name);
            }
            $file->move($originalPath, $fileName);
        }
        $model = $modelName::first();

        $cmsImage->update([
            'image_name' => $fileName,
            'imageable_id' => $model->id,
            'imageable_type' => request()->category,
            'path' => $path,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteImageList($galleryImageId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateImage = CMSImage::find($galleryImageId);
        if (!empty($updateImage)) {
            if(file_exists(getAbsolutePath().$updateImage->path.'/'.$updateImage->video_name)){
                File::delete(getAbsolutePath().$updateImage->path.'/'.$updateImage->video_name);
            }
            $updateImage->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
