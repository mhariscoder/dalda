<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSStories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CMSStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resultSet = CMSStories::all();
        return view('cms.website.story.index', compact('resultSet'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.website.story.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'heading' => ['required'],
            'video_description' => ['required'],
            'student_name' => ['required'],
            'uni_name' => ['required'],
            'description' => ['required'],
            'video_file' => ['required', 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt', 'max:40960'],
        ]);

        $file = request()->file('video_file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $path = '/assets/website/videos/';
        $originalPath = getAbsolutePath() . '/assets/website/videos/';
        if (!File::isDirectory($originalPath)) {
            File::makeDirectory($originalPath, 0777, true, true);
        }
        $file->move($originalPath, $fileName);

        $cmsStories = new CMSStories();
        $cmsStories->heading = $request->heading;
        $cmsStories->video_description = $request->video_description;
        $cmsStories->student_name = $request->student_name;
        $cmsStories->uni_name = $request->uni_name;
        $cmsStories->description = $request->description;
        $cmsStories->save();
        $cmsStories->getVideos()->create(['video_name' => $fileName, 'path' => $path]);

        return response()->json(['msg' => 'Successfully Added.']);
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
        //
        $resultSet = CMSStories::findOrfail($id);
        return view('cms.website.story.update', compact('resultSet'));
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
        //
        $request->validate([
            'heading' => ['required'],
            'video_description' => ['required'],
            'student_name' => ['required'],
            'uni_name' => ['required'],
            'description' => ['required'],
            'video_file' => ['mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt', 'max:40960'],
        ]);

        $cmsStories = CMSStories::findOrfail($id);
        if(empty($cmsStories)){
            return response()->json(['error' => 'Something went wrong!'],422);
        }
        if(request()->hasFile('video_file')){
            $file = request()->file('video_file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $path = '/assets/website/videos/';
            $originalPath = getAbsolutePath() . '/assets/website/videos/';
            if (!File::isDirectory($originalPath)) {
                File::makeDirectory($originalPath, 0777, true, true);
            }
            if(file_exists($originalPath.'/'.$cmsStories->getVideos->first()->video_name)){
                File::delete($originalPath.'/'.$cmsStories->getVideos->first()->video_name);
            }
            $file->move($originalPath, $fileName);
            $cmsStories->getVideos()->update(['video_name' => $fileName, 'path' => $path]);
        }
        $cmsStories->heading = $request->heading;
        $cmsStories->video_description = $request->video_description;
        $cmsStories->student_name = $request->student_name;
        $cmsStories->uni_name = $request->uni_name;
        $cmsStories->description = $request->description;
        $cmsStories->update();

        return response()->json(['msg' => 'Successfully Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $msg = "Some thing went wrong!";
        $code = 400;
        $story = CMSStories::find($id);
        if (!empty($story)) {
            if(file_exists(getAbsolutePath().$story->getVideos->first()->path.'/'.$story->getVideos->first()->video_name)){
                File::delete(getAbsolutePath().$story->getVideos->first()->path.'/'.$story->getVideos->first()->video_name);
            }
            $story->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
