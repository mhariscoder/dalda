<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\UniversityIcons;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CMSUniversityIconsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultSet = UniversityIcons::all();
        return view('cms.website.university-icons.index', compact('resultSet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.website.university-icons.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
        ]);
        if (request()->hasFile('icon')) {
            $img = Image::make(request()->file('icon'));
            $extension = request()->file('icon')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/images/pages/university-icons/';
            $destination = getAbsolutePath() . '/assets/website/images/pages/university-icons/' . $newFileName;

            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }

            $img->save($destination);
            UniversityIcons::create([
                'icon' => $newFileName,
            ]);
        }
        return response()->json(['msg' => 'Successfully added.']);
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
        $data = UniversityIcons::findOrFail($id);
        return view('cms.website.university-icons.update', compact('data'));
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
        $uniIcon = UniversityIcons::findOrFail($id);
        $request->validate([
            'icon' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
        ]);
        $oldImagePath = getAbsolutePath().'/assets/website/images/pages/university-icons/'.$uniIcon->icon;
        $path = getAbsolutePath().'/assets/website/images/pages/university-icons';
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $img = Image::make(request()->file('icon'));
        $extension = request()->file('icon')->extension();
        $random = Str::random(30);
        $dt = Carbon::now()->timestamp;
        $bannnerName = $random . '-' . $dt . '.' . $extension;
        $img->save($path.'/'.$bannnerName);
        if(file_exists($oldImagePath)){
            File::delete($oldImagePath);
        }
        $uniIcon->update([
            'icon' => $bannnerName,
        ]);
        return response()->json(['msg' => 'Successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $records = UniversityIcons::all();
        $data = $records->find($id);

        if (!empty($data)) {
                $data->delete();
                $msg = "Successfully Delete record!";
                $code = 200;
            }
        return response()->json(['msg' => $msg], $code);
    }
}
