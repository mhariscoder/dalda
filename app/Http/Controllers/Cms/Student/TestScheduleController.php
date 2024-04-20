<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestScheduleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $tests = UploadDocument::where('type','test-schedule')->latest()->get();
        return view('cms.upload-document.test-schedule.index', compact('tests'));
    }

    public function addForm()
    {
        return view('cms.upload-document.test-schedule.add');
    }

    public function addFormData()
    {
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title',
            'upload' => 'sometimes|nullable|file|mimes:doc,pdf,docx',
            'description' => 'sometimes|nullable|max:400'
        ]);

        if(request()->upload == '' && request()->description == '')
        {
            return response()->json(['error' => 'Please provide file or description.'],422);
        }

        $template = request()->file('upload');
        $newFileName = '';

        if (!empty($template)) {
            $newFileName = 'test-schedule' . Carbon::now()->timestamp . '.' . $template->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads'))){
                File::makeDirectory(storage_path('app/public/uploads'),0755, true);
            }
            Storage::putFileAs('public/uploads',$template,$newFileName);
        }

        UploadDocument::create([
            'title' => request()->title,
            'type' => 'test-schedule',
            'name' => $newFileName,
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updateForm($testId)
    {
        $test = UploadDocument::where('id',$testId)->where('type','test-schedule')->first();
        return view('cms.upload-document.test-schedule.update',compact('test'));
    }

    public function updateFormData($testId)
    {
        $test = UploadDocument::where('id',$testId)->where('type','test-schedule')->first();
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title,'.$testId,
            'upload' => 'sometimes|nullable|file|mimes:doc,pdf,docx',
            'description' => 'sometimes|nullable|max:400'
        ]);

        if(request()->upload == '' && request()->description == '' && $test->name == '' && $test->description == '')
        {
            return response()->json(['error' => 'Please provide file or description.'],422);
        }

        $template = request()->file('upload');

        if (!empty($template)) {
            Storage::delete('public/uploads/'.$test->name);
            $newFileName = 'test-schedule' . Carbon::now()->timestamp . '.' . $template->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads'))){
                File::makeDirectory(storage_path('app/public/uploads'),0755, true);
            }
            Storage::putFileAs('public/uploads',$template,$newFileName);
            $fileName = $newFileName;
        } else {
            $fileName = $test->name;
        }
        $test->update([
            'title' => request()->title,
            'type' => 'test-schedule',
            'name' => $fileName,
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteForm($testId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = UploadDocument::findOrFail($testId);

        if (!empty($upload)) {
            Storage::delete('public/uploads/'.$upload->name);
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
