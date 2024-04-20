<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSHome;
use App\Models\HomeHero;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class HomeHeroController extends Controller
{

    public function index()
    {
        $heroes = HomeHero::orderBy('sort_order', 'ASC')->get();

        return view('cms.website.home.heroes.index', compact('heroes'));
    }


    public function create()
    {
        return view('cms.website.home.heroes.add');
    }


    public function store(CMSHome $home)
    {
        request()->validate([
            'sort_order' => 'required|unique:home_heroes|integer|between:1,1000',
            'title' => ['required', 'max:55', 'unique:home_heroes'],
            'designation' => ['required'],
            'department' => ['required'],
            'description' => ['required', 'max:1000'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
        ]);

        if (request()->hasFile('image')) {
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/landing';
            $destination = getAbsolutePath() . '/assets/website/images/pages/landing/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);

            $heroes = new HomeHero();
            $heroes->title = request()->title;
            $heroes->designation = request()->designation;
            $heroes->department = request()->title;

            $heroes->description = request()->description;
            $heroes->image = $newFileName;
            $heroes->sort_order = request()->sort_order;

            $home->heroes()->save($heroes);
            return redirect('/admin/pages/heroes-list/' . $home->id)->with('success', 'Successfully added!');
        }
    }




    public function edit($heroId)
    {
        $updateHero = HomeHero::findOrFail($heroId);
        return view('cms.website.home.heroes.update', compact('updateHero'));
    }


    public function update($heroId)
    {

        $updateHero = HomeHero::findOrFail($heroId);
        request()->validate([
            'sort_order' => ['required'],
            'title' => ['required'],
            'designation' => ['required'],
            'department' => ['required'],
            'description' => ['required'],

        ]);
        $imageFileName = $updateHero->image;
        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png,svg', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath() . '/assets/website/images/pages/landing/' . $updateHero->image;
            $path = getAbsolutePath() . '/assets/website/images/pages/landing';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $imageFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path . '/' . $imageFileName);
            if (file_exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }

        $updateHero->update([
            'image' => $imageFileName,
            'title' => request()->title,
            'sort_order' => request()->sort_order,
            'designation' => request()->designation,
            'department' => request()->department,
            'description' => request()->description,

        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }


    public function destroy($heroId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateHeroData = HomeHero::find($heroId);

        if (!empty($updateHeroData)) {
            $updateHeroData->delete();
            $msg = "Successfully Deleted record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
