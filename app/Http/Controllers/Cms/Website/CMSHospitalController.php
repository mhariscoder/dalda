<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHospital;
use App\Models\CMSImage;
use App\Models\CMSVideo;

class CMSHospitalController extends Controller
{
    public function index()
    {
        $hospitals = CMSHospital::latest()->get();
        return view('cms.website.hospital.index',compact('hospitals'));
    }

    public function addList()
    {
        return view('cms.website.hospital.add');
    }

    public function addListData()
    {
        request()->validate([
            'hospital_name' => 'required|max:55|unique:cms_hospital,hospital_name,NULL,id,web_url,'.request('web_url').',deleted_at,NULL',
            'web_url' => 'required|string|max:55',
            'description' => 'sometimes|nullable|max:400'
        ]);

        CMSHospital::create([
            'hospital_name' => request()->hospital_name,
            'web_url' => request()->web_url,
            'description' => request()->description,
        ]);
        return redirect('/admin/hospital-list')->with('success','Successfully added!');
    }

    public function updateList($hospitalId)
    {
        $hospital = CMSHospital::where('id',$hospitalId)->first();
        return view('cms.website.hospital.update',compact('hospital'));
    }

    public function updateListData($hospitalId)
    {
        $hospital = CMSHospital::where('id',$hospitalId)->first();
        request()->validate([
            'hospital_name' => 'required|max:55|unique:cms_hospital,hospital_name,'.$hospitalId.',id,web_url,'.request('web_url').',deleted_at,NULL',
            'web_url' => 'required|string|max:55',
            'description' => 'sometimes|nullable|max:400'
        ]);
        $hospital->update([
            'hospital_name' => request()->hospital_name,
            'web_url' => request()->web_url,
            'description' => request()->description,
        ]);
        return redirect('/admin/hospital-list')->with('success','Successfully updated!');
    }

    public function deleteList($hospitalId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateHospital = CMSHospital::find($hospitalId);
        $galleryImage = CMSImage::where('imageable_id',$hospitalId)->first();
        $galleryVideo = CMSVideo::where('videoable_id',$hospitalId)->first();
        $check = true;
        if(!empty($galleryImage) || !empty($galleryVideo))
        {
            $msg = "Please remove records from gallery first!";
            $check = false;
        }

        if (!empty($updateHospital) && $check) {
            $updateHospital->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
