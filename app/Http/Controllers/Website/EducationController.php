<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSEducation;
use App\Models\CMSEducationBox;
use App\Models\CMSEducationServices;
use App\Models\HighAchieversStudent;
use App\Models\CMSContact;
use App\Models\User;
use App\Models\CMSEducationDirectory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EducationController extends Controller
{
    public function index()
    {
        // $scholarships = CMSEducation::latest()->educationFilter(request()->only('search'))->get();
        $education = CMSEducation::find(CMSEducation::EDUCATION_ID);
        $boxes = CMSEducationBox::where('education_id', $education->id)->orderBy('sort_order', 'asc')->get();
        $services = CMSEducationServices::where('education_id', $education->id)->orderBy('sort_order', 'asc')->get();
        $achievers = HighAchieversStudent::orderBy('position', 'asc')->limit(3)->get();
        $data = CMSEducationDirectory::query()->first();

        return view('website.education', compact('education', 'boxes', 'services', 'achievers', 'data'));
    }

    public function highAchievers(Request $request)
    {
        // $high_achievers = HighAchieversStudent::orderBy('position', 'asc')->get();
        // $contact = CMSContact::latest()->first();
        // $students = User::with('roles')->whereHas('roles', function ($q) {
        //     $q->where('name', 'student');
        // })->count();
        // return view('website.high-achievers', compact('high_achievers', 'contact', 'students'));
        $contact = CMSContact::latest()->first();
        $students = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->count();

        $search = $request->search;
        if ($search) {
            $high_achievers = HighAchieversStudent::whereHas('student', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%')->orWhere('last_name', 'LIKE', '%' . $search . '%');
            })
                ->orWhere('organization', 'LIKE', '%' . $search . '%')
                ->orWhere('designation', 'LIKE', '%' . $search . '%')->get();
            return  view('website.high-achievers', compact('high_achievers', 'contact', 'students'));
        } else {
            $high_achievers = HighAchieversStudent::orderBy('position', 'asc')->get();
            return view('website.high-achievers', compact('high_achievers', 'contact', 'students'));
        }
    }

    public function customerQuery(Request $request)
    {
        try {
            $queryParameters = json_encode($request->query->all());
    
            $data = [
                'title' => 'Counselling section query',
                'content' => $queryParameters,
            ];
        
            Mail::raw('This is the email content: ' . $data['content'], function ($message) {
                $message->to('test@yopmail.com')
                        ->subject('Subject of the email');
            });

            return redirect()->back();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
