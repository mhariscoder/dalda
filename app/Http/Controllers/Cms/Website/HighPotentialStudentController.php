<?php

namespace App\Http\Controllers\Cms\Website;

use App\Models\HighPotentialStudent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HighPotentialStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resultSet = HighPotentialStudent::orderBy('position','asc')->get();
        return view("cms.website.high-potential-student.index", compact("resultSet"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = User::role('student')->select(['id', 'first_name', 'last_name', 'student_id'])->orderBy('student_id','asc')->get();
        return view("cms.website.high-potential-student.add", compact("students"));
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
              "student_id" => "required|exists:users,id|unique:high_potential_students,student_id",
              "position" => "required|numeric|unique:high_potential_students,position",
        ]);

        $highPotentialStudent = new HighPotentialStudent();
        $highPotentialStudent->student_id = $request->student_id;
        $highPotentialStudent->position = $request->position;
        $highPotentialStudent->save();

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
        $resultSet = HighPotentialStudent::find($id);
        return view("cms.website.high-potential-student.update", compact("resultSet","students"));
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
        $highPotentialStudent = HighPotentialStudent::findOrFail($id);
        $request->validate([
            "student_id" => "required|exists:users,id|unique:high_potential_students,student_id,$id",
            "position" => "required|numeric|unique:high_potential_students,position,$id",
        ]);

        $highPotentialStudent->student_id = $request->student_id;
        $highPotentialStudent->position = $request->position;
        $highPotentialStudent->update();

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
        $student = HighPotentialStudent::find($id);
        if (!empty($student)) {
            $student->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
