<?php

namespace App\Http\Controllers\Cms\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\TestResult;
use App\Events\TestResult as TestResultEvent;
use App\Models\UploadDocument;
use App\Models\User;

class TestResultController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $testResult = TestResult::with('getExam')->latest()->get();
        return view('cms.announcement.test-result.index', compact('testResult'));
    }

    public function addTestResult()
    {
        $students = User::where('student_id', '!=', null)->where('deleted_at', null)->where('is_block', 0)->get();
        $exams = UploadDocument::select(['id','title'])->where('type','exam')->get();
        if($exams->isEmpty())
        {
            return redirect('/admin/exam')->with(['message' => 'You cannot upload test result without exam.']);
        }
        return view('cms.announcement.test-result.add', compact('students','exams'));
    }

    public function addTestResultData()
    {
        request()->validate([
            'student_name' => ['required', 'in:' . implode(',', User::where('student_id', '!=', null)->where('deleted_at', null)->where('is_block', 0)->pluck('id')->toArray()),'unique:test_results,user_id,NULL,id,upload_document_id,'.request('exam_name').',deleted_at,NULL'],
            'exam_name' => ['required', 'in:' . implode(',', UploadDocument::where('type','exam')->pluck('id')->toArray())],
            'marks' => 'required|numeric',
            'percentage' => 'required|numeric|between:1,100'
        ]);

        $data = TestResult::create([
            'user_id' => (int)request()->student_name,
            'upload_document_id' => (int)request()->exam_name,
            'marks' => request()->marks,
            'percentage' => request()->percentage
        ]);

        Notification::create([
            'user_id' => $data->user_id,
            'type' => 'test-result-uploaded',
            'message' => "! Your result is uploaded on the portal."
        ]);

        // event(new TestResultEvent($data, 'uploaded'));

        return redirect('/admin/student-result')->with('success', 'Successfully added.');
    }

    public function updateTestResult($testResultId)
    {
        $students = User::where('student_id', '!=', null)->where('deleted_at', null)->where('is_block', 0)->get();
        $exams = UploadDocument::select(['id','title'])->where('type','exam')->get();
        $testResult = TestResult::where('id', $testResultId)->first();
        return view('cms.announcement.test-result.update', compact('testResult', 'students','exams'));
    }

    public function updateTestResultData($testResultId)
    {
        $testResult = TestResult::where('id', $testResultId)->first();
        request()->validate([
            'student_name' => ['required', 'in:' . implode(',', User::where('student_id', '!=', null)->where('deleted_at', null)->where('is_block', 0)->pluck('id')->toArray()),'unique:test_results,user_id,'.$testResultId.',id,upload_document_id,'.request('exam_name').',deleted_at,NULL'],
            'exam_name' => ['required', 'in:' . implode(',', UploadDocument::where('type','exam')->pluck('id')->toArray())],
            'marks' => 'required|numeric',
            'percentage' => 'required|numeric|between:1,100'
        ]);

        $testResult->update([
            'user_id' => (int)request()->student_name,
            'upload_document_id' => (int)request()->exam_name,
            'marks' => request()->marks,
            'percentage' => request()->percentage
        ]);

        $data = Notification::create([
            'user_id' => TestResult::where('id', $testResultId)->first()->user_id,
            'type' => 'test-result-updated',
            'message' => "! Your result is updated on the portal."
        ]);

        // event(new TestResultEvent($data, 'updated'));

        return redirect('/admin/student-result')->with('success', 'Successfully updated.');
    }

    public function deleteTestResult($testResultId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $upload = TestResult::findOrFail($testResultId);

        if (!empty($upload)) {
            $upload->delete();
            $msg = "Successfully Deleted!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
