<?php

namespace App\Http\Controllers\Cms\Student;

use App\Http\Controllers\Controller;
use App\Models\UploadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:upload-documents|add-documents|delete-documents',['only' => 'index','addDocumentData']);
        $this->middleware('permission:add-documents',['only' => 'addDocument','addDocumentData']);
        $this->middleware('permission:delete-documents',['only' => 'deleteDocument']);
    }

    public function index()
    {
        $uploads = UploadDocument::whereNotIn('type',['eligibility-criteria','course-offering','exam','test-schedule'])->latest()->get();
        return view('cms.upload-document.index',compact('uploads'));
    }

    public function addDocument()
    {
        return view('cms.upload-document.add');
    }

    public function addDocumentData()
    {
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title',
            'upload' => 'sometimes|nullable|file|mimes:pdf,docx',
            'description' => 'sometimes|nullable|max:400'
        ]);

        if(request()->upload == '' && request()->description == '')
        {
            return response()->json(['error' => 'Please provide file or description.'],422);
        }

        $template = request()->file('upload');
        $newFileName = '';

        if (!empty($template)) {
            $originalName = explode('.',$template->getClientOriginalName());
            $newFileName = substr(Arr::first($originalName), 0, 14).'-'. Carbon::now()->timestamp . '.' . $template->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads/documents'))){
                File::makeDirectory(storage_path('app/public/uploads/documents'),0755, true);
            }
            Storage::putFileAs('public/uploads/documents',$template,$newFileName);
        }

        UploadDocument::create([
            'title' => request()->title,
            'type' => strtolower(str_replace(' ','-',request()->title)),
            'name' => $newFileName,
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully added.']);

    }

    public function updateDocument($documentId)
    {
        $upload = UploadDocument::where('id',$documentId)->whereNotIn('type',['eligibility-criteria','course-offering','exam','test-schedule'])->first();
        return view('cms.upload-document.update',compact('upload'));
    }

    public function updateDocumentData($documentId)
    {
        $upload = UploadDocument::where('id',$documentId)->whereNotIn('type',['eligibility-criteria','course-offering','exam','test-schedule'])->first();
        request()->validate([
            'title' => 'required|max:100|unique:upload_documents,title,'.$documentId,
            'upload' => 'sometimes|nullable|file|mimes:pdf,docx',
            'description' => 'sometimes|nullable|max:400'
        ]);

        if(request()->upload == '' && request()->description == '' && $upload->name == '' && $upload->description == '')
        {
            return response()->json(['error' => 'Please provide file or description.'],422);
        }

        $template = request()->file('upload');

        if (!empty($template)) {
            $originalName = explode('.',$template->getClientOriginalName());
            $newFileName = substr(Arr::first($originalName), 0, 14).'-'. Carbon::now()->timestamp . '.' . $template->getClientOriginalExtension();
            if(!File::isDirectory(storage_path('app/public/uploads/documents'))){
                File::makeDirectory(storage_path('app/public/uploads/documents'),0755, true);
            }
            Storage::putFileAs('public/uploads/documents',$template,$newFileName);
            $fileName = $newFileName;
            Storage::delete('public/uploads/'.$upload->name);
        } else {
            $fileName = $upload->name;
        }

        $upload->update([
            'title' => request()->title,
            'type' => strtolower(str_replace(' ','-',request()->title)),
            'name' => $fileName,
            'description' => request()->description
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deleteDocument($deleteId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = UploadDocument::findOrFail($deleteId);

        if (!empty($upload)) {
            Storage::delete('uploads/documents/'.$upload->name);
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
