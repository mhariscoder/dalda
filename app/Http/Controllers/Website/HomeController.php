<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ApplyScholarShip;
use App\Models\CMSAgriculture;
use App\Models\CMSHome;
use App\Models\ClaimScholarShip;
use App\Models\CMSImage;
use App\Models\CMSContact;
use App\Models\CMSMediaCenter;
use App\Models\HomeHero;
use App\Models\UniversityIcons;
use App\Models\HighPotentialStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        $home = CMSHome::find(CMSHome::HOME_ID);
        $university_logo = UniversityIcons::all();
        $hero = HomeHero::where('home_id', $home->id)->orderBy('sort_order', 'asc')->get();
        $high_potentials = HighPotentialStudent::orderBy('position', 'asc')->limit(3)->get();
        $scholarshipCount = ApplyScholarShip::where('status', 'approved')->count();
        $claim_scholarship_count = ClaimScholarShip::where('status', 'approved')->count();
        $students = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->count();

        return view('website.index', compact('home', 'claim_scholarship_count', 'university_logo', 'hero', 'high_potentials', 'scholarshipCount', 'students'));



        // $resultSet = CMSHome::latest()->get()->take(3);
        // $images = CMSImage::all();
        // $news = CMSMediaCenter::where('type','news')->latest()->get()->take(3);
        // $agricultureImages = $images->filter(function ($val){
        //    return $val->imageable_type === 'Agriculture';
        // })->take(3);
        // $educationImages = $images->filter(function ($val){
        //     return $val->imageable_type === 'Education / Scholarship';
        // })->take(3);
        // $hospitalImages = $images->filter(function ($val){
        //     return $val->imageable_type === 'Hospital';
        // })->take(3);
        // $galleryImages = $images->take(10);
        // return view('website.index',compact('resultSet','agricultureImages','educationImages','hospitalImages','galleryImages','news'));
    }

    public function highPotentials(Request $request, $highPotentialId = null)
    {
        $contact = CMSContact::latest()->first();
        $students = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->count();
        $search = $request->search;
        if ($search) {
            $high_potentials = HighPotentialStudent::whereHas('student', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%')->orWhere('last_name', 'LIKE', '%' . $search . '%');

            })->get();

            return view('website.high-potentials', compact('high_potentials', 'contact', 'students'));
        } else {
            $high_potentials = HighPotentialStudent::orderBy('position', 'asc')->get();
            return view('website.high-potentials', compact('high_potentials', 'contact', 'students'));
        }
        // $high_potentials = HighPotentialStudent::orderBy('position', 'asc')->get();
        // $contact = CMSContact::latest()->first();
        // $students = User::with('roles')->whereHas('roles', function($q){
        //     $q->where('name','student');
        // })->count();

        // return view('website.high-potentials', compact('high_potentials', 'contact','students'));
    }
}
