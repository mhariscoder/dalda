<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EligibilityCriteriaController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $criterias = UploadDocument::where('type','eligibility-criteria')->latest()->get();
        return view('cms.upload-document.eligibility-criteria.index', compact('criterias'));
    }

    public function addForm()
    {
        return view('cms.upload-document.eligibility-criteria.add');
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
            'type' => 'eligibility-criteria',
            'description' => request()->description
        ]);
        return redirect('/admin/eligibility-criteria')->with('success','Successfully added.');
    }

    public function updateForm($eligibilityId)
    {
        $criteria = UploadDocument::where('id',$eligibilityId)->where('type','eligibility-criteria')->first();
        return view('cms.upload-document.eligibility-criteria.update',compact('criteria'));
    }

    public function updateFormData($eligibilityId)
    {
        $criteria = UploadDocument::where('id',$eligibilityId)->where('type','eligibility-criteria')->first();
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title,'.$eligibilityId,
            'description' => 'required'
        ]);

        if(count(explode(' ', request()->description)) > 350){
            return back()->withErrors(['error'=>'description has more than 350 words.'])->withInput();
        }

        $criteria->update([
            'title' => request()->title,
            'type' => 'eligibility-criteria',
            'description' => request()->description
        ]);
        return redirect('/admin/eligibility-criteria')->with('success','Successfully updated.');
    }

    public function deleteForm($eligibilityId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = UploadDocument::findOrFail($eligibilityId);

        if (!empty($upload)) {
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
