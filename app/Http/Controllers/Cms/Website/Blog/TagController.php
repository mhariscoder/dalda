<?php

namespace App\Http\Controllers\Cms\Website\Blog;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('cms.website.blog.tag.index', compact('tags'));
    }

    public function addTag()
    {
        return view('cms.website.blog.tag.add');
    }

    public function addTagData()
    {
        request()->validate([
            'name' => 'required|max:100|unique:tags,name'
        ]);

        Tag::create([
            'name' => trim(request()->name),
            'slug' => Str::slug(trim(request()->name))
        ]);

        return redirect('/admin/blog/tags')->with('success','Tag successfully added.');
    }

    public function updateTag($tagId)
    {
        $updateTag = Tag::findOrFail($tagId);
        return view('cms.website.blog.tag.update',compact('updateTag'));
    }

    public function updateTagData($tagId)
    {
        $tag = Tag::findOrFail($tagId);

        request()->validate([
            'name' => ['required','max:100','unique:tags,name,'.$tagId]
        ]);

        $tag->update([
            'name' => trim(request()->name),
            'slug' => Str::slug(trim(request()->name))
        ]);

        return redirect('/admin/blog/tags')->with('success','Tag successfully updated.');
    }

    public function deleteTag($tagId){
        $msg = 'Something went wrong.';
        $code = 400;
        $tag = Tag::findOrFail($tagId);

        if (!empty($tag)) {
            $tagPost = $tag->getPosts()->first();
            if(!empty($tagPost))
            {
                $msg = "Delete relational data first!";
            } else {
                $tag->delete();
                $msg = "Successfully Delete record!";
                $code = 200;
            }
        }
        return response()->json(['msg' => $msg], $code);
    }
}
