<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $exams = UploadDocument::where('type','exam')->latest()->get();
        return view('cms.upload-document.exam.index', compact('exams'));
    }

    public function addForm()
    {
        return view('cms.upload-document.exam.add');
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
            'type' => 'exam',
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateForm($examId)
    {
        $exam = UploadDocument::where('id',$examId)->where('type','exam')->first();
        return view('cms.upload-document.exam.update',compact('exam'));
    }

    public function updateFormData($examId)
    {
        $exam = UploadDocument::where('id',$examId)->where('type','exam')->first();
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title,'.$examId,
            'description' => 'required'
        ]);

        if(count(explode(' ', request()->description)) > 350){
            return back()->withErrors(['error'=>'description has more than 350 words.'])->withInput();
        }

        $exam->update([
            'title' => request()->title,
            'type' => 'exam',
            'name' => !empty($newFileName) ? $newFileName : $exam->name,
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteForm($examId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = UploadDocument::findOrFail($examId);

        if (!empty($upload)) {
            Storage::delete('public/uploads/'.$upload->name);
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
