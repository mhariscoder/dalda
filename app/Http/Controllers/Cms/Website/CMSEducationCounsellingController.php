<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\CounsellingCategory;
use App\Models\Counselling;

class CMSEducationCounsellingController extends Controller
{
    public function index()
    {
        $counsellingCategories = CounsellingCategory::query()->get();
        $counsellings = Counselling::query()->with('counsellingCategory')->get();

        return view('cms.website.education.counselling.index', compact('counsellingCategories', 'counsellings'));
    }

    public function _create()
    {
        return view('cms.website.education.counselling-category.add');
    }

    public function create()
    {
        $counsellingCategories = CounsellingCategory::query()->get();
        return view('cms.website.education.counselling.add', compact('counsellingCategories'));
    }

    public function _store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $counsellingCategories = CounsellingCategory::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('counselling.index')->with('success', 'Counselling category created successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'counselling_category_id' => 'required|exists:counselling_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $counselling = Counselling::create([
            'counselling_category_id' => $request->input('counselling_category_id'),
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        return redirect()->route('counselling.index')->with('success', 'Counselling created successfully');
    }

    public function _edit($id)
    {
        $counsellingCategories = CounsellingCategory::find($id);
        
        if (!$counsellingCategories) {
            return redirect()->back()->with('error', 'Counselling category not found.');
        }

        return view('cms.website.education.counselling-category.update', compact('counsellingCategories'));
    }


    public function edit($id)
    {
        $counsellingCategories = CounsellingCategory::query()->get();
        $counsellings = Counselling::find($id);
        return view('cms.website.education.counselling.update', compact('counsellingCategories', 'counsellings'));
    }

    public function _update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $counsellingCategories = CounsellingCategory::findOrFail($id);

        $counsellingCategories->fill($request->only(['title', 'description']));

        $counsellingCategories->save();

        return redirect()->route('counselling.index')->with('success', 'Counselling category updated successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'counselling_category_id' => 'exists:counselling_categories,id',
            'question' => 'string',
            'answer' => 'string',
        ]);

        $counselling = Counselling::findOrFail($id);

        $counselling->fill($request->only(['counselling_category_id', 'question', 'answer']));

        $counselling->save();

        return redirect()->route('counselling.index')->with('success', 'Counselling updated successfully');
    }

    public function _destroy($id)
    {
        $counsellingCategories = CounsellingCategory::findOrFail($id);
        $counsellingCategories->delete();
        return response()->json(['message' => 'Counselling category deleted successfully'], 200);
    }

    public function destroy($id)
    {
        $counselling = Counselling::findOrFail($id);
        $counselling->delete();
        return response()->json(['message' => 'Counselling deleted successfully'], 200);
    }
}
