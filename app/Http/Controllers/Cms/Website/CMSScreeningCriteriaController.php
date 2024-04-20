<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CMSScreeningCriteria;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CMSScreeningCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resultSet = CMSScreeningCriteria::where('id' , CMSScreeningCriteria::SCREENING_CRITERIA_ID)->first();
        return view('cms.website.screening_criteria.update', compact('resultSet'));
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
        $resultSet = CMSScreeningCriteria::findOrFail($id);
        return view('cms.website.screening-criteria.update', compact('resultSet'));

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
        $screening_criteria = CMSScreeningCriteria::findOrFail($id);
        $request->validate([
            "heading" => "required|string",
            "description" => "required|string",
            "criteria_points" => "required|string",
            "section2_heading" => "required|string",
            "section2_content" => "required|string",
            "section3_heading" => "required|string",
            "section3_description" => "required|string",
            "high_achievers_points" => "required|string",
        ]);

        if (!empty(request()->file('section2_image'))) {
            request()->validate([
                'section2_image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/pages/screening-criteria/'.$screening_criteria->section2_image;
            $path = getAbsolutePath().'/assets/website/images/pages/screening-criteria';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('section2_image'));
            $extension = request()->file('section2_image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $imageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$imageFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
            $screening_criteria->section2_image = $imageFileName;
        }
        $screening_criteria->heading = $request->heading;
        $screening_criteria->description = $request->description;
        $screening_criteria->criteria_points = $request->criteria_points;
        $screening_criteria->section2_heading = $request->section2_heading;
        $screening_criteria->section2_content = $request->section2_content;
        $screening_criteria->section3_heading = $request->section3_heading;
        $screening_criteria->section3_description = $request->section3_description;
        $screening_criteria->high_achievers_points = $request->high_achievers_points;
        $screening_criteria->update();

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
