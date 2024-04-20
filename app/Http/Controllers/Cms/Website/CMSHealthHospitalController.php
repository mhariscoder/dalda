<?php

namespace App\Http\Controllers\Cms\Website;


use App\Http\Controllers\Controller;
use App\Models\CmsHealth;
use App\Models\CmsHealthHospital;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CMSHealthHospitalController extends Controller
{

    public function index()
    {
        $hospital = CmsHealthHospital::orderBy('sort_order', 'ASC')->get();

        return view('cms.website.health.hospitals.index', compact('hospital'));
    }


    public function create()
    {
        return view('cms.website.health.hospitals.add');
    }


    public function store(CmsHealth $health)
    {


        request()->validate([
            'name' => 'required|unique:cms_health_hospitals',
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            'sort_order' => 'required|unique:cms_health_hospitals|integer|between:1,1000',

        ]);

        if (request()->hasFile('image')) {
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/health';
            $destination = getAbsolutePath() . '/assets/website/images/pages/health/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);

            $hospital = new CmsHealthHospital();
            $hospital->name = request()->name;
            $hospital->sort_order = request()->sort_order;

            $hospital->image = $newFileName;
            $health->hasHospitals()->save($hospital);

            return redirect('/admin/pages/health/hospitals-list/' . $hospital->id)->with('success', 'Successfully added!');
        }
    }




    public function edit($hospitalId)
    {
        $updateHospital = CmsHealthHospital::findOrFail($hospitalId);

        return view('cms.website.health.hospitals.update', compact('updateHospital'));
    }


    public function update($hospitalId)
    {
        $updateHospital = CmsHealthHospital::findOrFail($hospitalId);
        request()->validate([
            'name' => 'required',
            'sort_order' => 'required',

        ]);
        $imageFileName = $updateHospital->image;
        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/health/' . $updateHospital->image;
            $path = getAbsolutePath() . '/assets/website/images/pages/health';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $imageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $imageFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        $updateHospital->update([
            'name' => request()->name,
            'image' => $imageFileName,
            'sort_order' => request()->sort_order,


        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }


    public function destroy($hospitalId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateData = CmsHealthHospital::find($hospitalId);

        if (!empty($updateData)) {
            $updateData->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
