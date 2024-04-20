<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSEducation;
use App\Models\CMSEducationServices;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CMSEducationServicesController extends Controller
{

    public function index()
    {
        $service = CMSEducationServices::orderBy('sort_order', 'ASC')->get();

        return view('cms.website.education.services.index', compact('service'));
    }


    public function create()
    {
        return view('cms.website.education.services.add');
    }


    public function store(CMSEducation $education)
    {
        request()->validate([
            'heading' => ['required', 'max:55', 'unique:cms_education_services'],
            'sort_order' => 'required|unique:cms_education_services|integer|between:1,1000',
            'description' => ['sometimes', 'max:1000'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
        ]);

        if (request()->hasFile('image')) {
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/education';
            $destination = getAbsolutePath() . '/assets/website/images/pages/education/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);

            $services = new CMSEducationServices();
            $services->heading = request()->heading;
            $services->sort_order = request()->sort_order;
            $services->description = request()->description;
            $services->image = $newFileName;

            $education->services()->save($services);
            return redirect('/admin/pages/education/services-list/' . $education->id)->with('success', 'Successfully added!');
        }
    }




    public function edit($serviceId)
    {
        $updateServices = CMSEducationServices::findOrFail($serviceId);
        return view('cms.website.education.services.update', compact('updateServices'));
    }


    public function update($serviceId)
    {

        $updateServices = CMSEducationServices::findOrFail($serviceId);
        request()->validate([
            'heading' => ['required'],
            'sort_order' => ['required'],
            'description' => ['required'],

        ]);
        $imageFileName = $updateServices->image;
        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/education/' . $updateServices->image;
            $path = getAbsolutePath() . '/assets/website/images/pages/education';
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

        $updateServices->update([
            'image' => $imageFileName,
            'heading' => request()->heading,
            'sort_order' => request()->sort_order,
            'description' => request()->description,

        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }


    public function destroy($servicesId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateServiceData = CMSEducationServices::find($servicesId);

        if (!empty($updateServiceData)) {
            $updateServiceData->delete();
            $msg = "Successfully Deleted record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
