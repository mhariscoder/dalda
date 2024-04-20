<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProcessToApply;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSProcessToApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $resultSet = ProcessToApply::findOrFail($id);
        return view('cms.website.process-to-apply.update', compact('resultSet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $process_to_apply = ProcessToApply::findOrFail($id);
        $request->validate([
            "heading" => "required|string",
            "sub_heading" => "required|string",
            "description" => "required|string",
            "image_description1" => "required|string",
            "image_description2" => "required|string",
            "apply_steps" => "required|string",
        ]);

        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/process-to-apply/'.$process_to_apply->image;
            $path = getAbsolutePath().'/assets/website/images/pages/process-to-apply';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $imageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$imageFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
            $process_to_apply->image = $imageFileName;
        }
        $process_to_apply->heading = $request->heading;
        $process_to_apply->sub_heading = $request->sub_heading;
        $process_to_apply->description = $request->description;
        $process_to_apply->image_description1 = $request->image_description1;
        $process_to_apply->image_description2 = $request->image_description2;
        $process_to_apply->apply_steps = $request->apply_steps;
        $process_to_apply->update();

        return response()->json(['msg' => 'Student Successfully Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
