<?php

namespace App\Http\Controllers\Cms\Website\Blog;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::all();
        return view('cms.website.blog.category.index', compact('categories'));
    }

    public function addCategory()
    {
        return view('cms.website.blog.category.add');
    }

    public function addCategoryData()
    {
        request()->validate([
            'name' => 'required|max:100|unique:post_categories,name'
        ]);

        PostCategory::create([
            'name' => trim(request()->name),
            'slug' => Str::slug(trim(request()->name))
        ]);

        return redirect('/admin/blog/categories')->with('success','Category successfully added.');
    }

    public function updateCategory($categoryId)
    {
        $updateCategory = PostCategory::findOrFail($categoryId);
        return view('cms.website.blog.category.update',compact('updateCategory'));
    }

    public function updateCategoryData($categoryId)
    {
        $tag = PostCategory::findOrFail($categoryId);

        request()->validate([
            'name' => ['required','max:100','unique:post_categories,name,'.$categoryId]
        ]);

        $tag->update([
            'name' => trim(request()->name),
            'slug' => Str::slug(trim(request()->name))
        ]);

        return redirect('/admin/blog/categories')->with('success','Category successfully updated.');
    }

    public function deleteCategory($categoryId){
        $msg = 'Something went wrong.';
        $code = 400;
        $category = PostCategory::findOrFail($categoryId);

        if (!empty($category)) {
            $categoryPost = $category->getPosts()->first();
            if(!empty($categoryPost))
            {
                $msg = "Delete relational data first!";
            } else {
                $category->delete();
                $msg = "Successfully Delete record!";
                $code = 200;
            }
        }
        return response()->json(['msg' => $msg], $code);
    }
}
