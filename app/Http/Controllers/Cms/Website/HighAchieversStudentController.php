<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HighAchieversStudent;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HighAchieversStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resultSet = HighAchieversStudent::orderBy('position','asc')->get();
        return view("cms.website.high-achievers-student.index", compact("resultSet"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = User::role('student')->select(['id', 'first_name', 'last_name','student_id'])->orderBy('student_id','asc')->get();
        return view("cms.website.high-achievers-student.add", compact("students"));
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
        $request->validate([
              "student_id" => "required|exists:users,id|unique:high_achievers_students,student_id",
              "position" => "required|numeric|unique:high_achievers_students,position",
        ]);
        $highAchieversStudent = new HighAchieversStudent();
        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $path = getAbsolutePath().'/assets/website/images/highAchievers';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $imageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$imageFileName);
            $highAchieversStudent->image = $imageFileName;
        }
        if($request->has('description')){
            $request->validate([
                "description" => "string",
            ]);
            $highAchieversStudent->description = $request->description;
        }
        if($request->has('details')){
            $request->validate([
                "details" => "string",
            ]);
            $highAchieversStudent->details = $request->details;
        }

        if($request->has('designation')){
            $request->validate([
                "designation" => "string",
            ]);
            $highAchieversStudent->designation = $request->designation;
        }
        if($request->has('organization')){
            $request->validate([
                "organization" => "string",
            ]);
            $highAchieversStudent->organization = $request->organization;
        }
        if($request->has('uni_name')){
            $request->validate([
                "uni_name" => "string",
            ]);
            $highAchieversStudent->uni_name = $request->uni_name;
        }


        $highAchieversStudent->student_id = $request->student_id;
        $highAchieversStudent->position = $request->position;
        $highAchieversStudent->save();

        return response()->json(['msg' => 'Student Successfully Added.']);

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
        $students = User::role('student')->select(['id', 'first_name', 'last_name', 'student_id'])->orderBy('student_id','asc')->get();
        $resultSet = HighAchieversStudent::find($id);
        return view("cms.website.high-achievers-student.update", compact("resultSet","students"));
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
        $highAchieversStudent = HighAchieversStudent::findOrFail($id);
        $request->validate([
            "student_id" => "required|exists:users,id|unique:high_achievers_students,student_id,$id",
            "position" => "required|numeric|unique:high_achievers_students,position,$id",
        ]);

        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/images/highAchievers/'.$highAchieversStudent->image;
            $path = getAbsolutePath().'/assets/website/images/highAchievers';
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
            $highAchieversStudent->image = $imageFileName;
        }
        if($request->has('description')){
            $request->validate([
                "description" => "string",
            ]);
            $highAchieversStudent->description = $request->description;
        }
        if($request->has('details')){
            $request->validate([
                "details" => "string",
            ]);
            $highAchieversStudent->details = $request->details;
        }

        if($request->has('designation')){
            $request->validate([
                "designation" => "string",
            ]);
            $highAchieversStudent->designation = $request->designation;
        }
        if($request->has('organization')){
            $request->validate([
                "organization" => "string",
            ]);
            $highAchieversStudent->organization = $request->organization;
        }
        if($request->has('uni_name')){
            $request->validate([
                "uni_name" => "string",
            ]);
            $highAchieversStudent->uni_name = $request->uni_name;
        }
        $highAchieversStudent->student_id = $request->student_id;
        $highAchieversStudent->position = $request->position;
        $highAchieversStudent->update();

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
        $msg = "Some thing went wrong!";
        $code = 400;
        $student = HighAchieversStudent::find($id);
        if (!empty($student)) {
            if(file_exists(getAbsolutePath().'/assets/website/images/highAchievers/'.$student->image)){
                File::delete(getAbsolutePath().'/assets/website/images/highAchievers/'.$student->image);
            }
            $student->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
