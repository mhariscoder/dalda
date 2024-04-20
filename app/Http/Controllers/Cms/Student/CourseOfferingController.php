<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CourseOfferingController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $courses = UploadDocument::where('type','course-offering')->latest()->get();
        return view('cms.upload-document.course-offering.index', compact('courses'));
    }

    public function addForm()
    {
        return view('cms.upload-document.course-offering.add');
    }

    public function addFormData()
    {
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title',
            'description' => 'required'
        ]);

        if(count(explode(' ', request()->description)) > 350){
            return back()->withErrors(['error'=>'description has more than 350 words.'])->withInput();
        }

        UploadDocument::create([
            'title' => request()->title,
            'type' => 'course-offering',
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateForm($courseId)
    {
        $course = UploadDocument::where('id',$courseId)->where('type','course-offering')->first();
        return view('cms.upload-document.course-offering.update',compact('course'));
    }

    public function updateFormData($courseId)
    {
        $course = UploadDocument::where('id',$courseId)->where('type','course-offering')->first();
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title,'.$courseId,
            'description' => 'required'
        ]);

        if(count(explode(' ', request()->description)) > 350){
            return back()->withErrors(['error'=>'description has more than 350 words.'])->withInput();
        }

        $course->update([
            'title' => request()->title,
            'type' => 'course-offering',
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteForm($courseId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = UploadDocument::findOrFail($courseId);

        if (!empty($upload)) {
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
