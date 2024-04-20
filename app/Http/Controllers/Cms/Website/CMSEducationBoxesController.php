<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use App\Models\CMSEducation;
use App\Models\CMSEducationBox;
use Illuminate\Http\Request;

class CMSEducationBoxesController extends Controller
{

    public function index()
    {

        $box = CMSEducationBox::orderBy('sort_order', 'ASC')->get();
        return view('cms.website.education.box.index', compact('box'));
    }


    public function create()
    {
        return view('cms.website.education.box.add');
    }


    public function store(CMSEducation $education)
    {


        request()->validate([
            'heading' => 'required|unique:cms_education_boxes',
            'sort_order' => 'required|unique:cms_education_boxes|integer|between:1,1000',
            'description' => 'required|nullable|max:400'
        ]);

        $box = new CMSEducationBox();
        $box->heading = request()->heading;
        $box->sort_order = request()->sort_order;
        $box->description = request()->description;



        $education->hasBoxes()->save($box);
        return redirect('/admin/pages/education/education-box-list/' . $education->id)->with('success', 'Successfully added!');
    }




    public function edit(CMSEducationBox $box)
    {

        return  view('cms.website.education.box.update', compact('box'));
    }


    public function update(Request $request, CMSEducationBox $box)
    {
        $request->validate([
            'heading' => 'required',
            'sort_order' => 'required|unique:cms_education_boxes,sort_order,' . $box->id,
            'description' => 'required',

        ]);

        $box->update($request->all());
        return redirect()->route('education-box.index',CMSEducation::EDUCATION_ID )->withSuccess('Successfully Updated record!');
    }


    public function destroy($boxId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updateBoxData = CMSEducationBox::find($boxId);

        if (!empty($updateBoxData)) {
            $updateBoxData->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }
        return response()->json(['msg' => $msg], $code);
    }
}
