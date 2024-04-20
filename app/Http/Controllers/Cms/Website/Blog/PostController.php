<?php

namespace App\Http\Controllers\Cms\Website\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $resultSet = Post::all();
        return view('cms.website.blog.post.index', compact('resultSet'));
    }

    public function addPost()
    {
        $tags = Tag::all();
        $categories = PostCategory::all();
        return view('cms.website.blog.post.add',compact('tags','categories'));
    }

    public function addPostData()
    {
        request()->validate([
            'title' => ['required', 'max:55', 'unique:posts,title'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            'description' => ['required', 'max:1000'],
            'category' => ['required', 'in:'.implode(',',PostCategory::pluck('id')->toArray())],
            'tags' => ['required','array'],
            'tags.*' => ['required', 'in:' . implode(',', Tag::pluck('id')->toArray())]
        ]);

        $newFileName = '';

        if (request()->hasFile('image')) {
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $purposePath = getAbsolutePath() . '/assets/website/blog/images';
            $destination = getAbsolutePath() . '/assets/website/blog/images/' . $newFileName;
            if (!File::isDirectory($purposePath)) {
                File::makeDirectory($purposePath, 0777, true, true);
            }
            $img->save($destination);
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'post_category_id' => (int)request()->category,
            'title' => request()->title,
            'image' => $newFileName,
            'description' => request()->description,
            'slug' => Str::slug(request()->title)
        ]);

       $post->getTags()->attach(request()->tags);

        return response()->json(['msg' => 'Successfully added.']);
    }

    public function updatePost($cmsPostId)
    {
        $tags = Tag::all();
        $categories = PostCategory::all();
        $updatePost = Post::findOrFail($cmsPostId);
        $tagsId = $updatePost->getTags()->get()->pluck('id')->toArray();
        return view('cms.website.blog.post.update', compact('updatePost','tags','categories','tagsId'));
    }

    public function updatePostData($cmsPostId)
    {
        $updatePost = Post::findOrFail($cmsPostId);
        request()->validate([
            'title' => ['required', 'max:55', 'unique:posts,title,' . $cmsPostId],
            'description' => ['required', 'max:1000'],
            'category' => ['required', 'in:'.implode(',',PostCategory::pluck('id')->toArray())],
            'tags' => ['required','array'],
            'tags.*' => ['required', 'in:' . implode(',', Tag::pluck('id')->toArray())]
        ]);

        $newFileName = $updatePost->image;

        if (!empty(request()->file('image'))) {
            request()->validate([
                'image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:10480'],
            ]);
            $oldImagePath = getAbsolutePath().'/assets/website/blog/images/'.$updatePost->image;
            $path = getAbsolutePath().'/assets/website/blog/images';
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $img = Image::make(request()->file('image'));
            $extension = request()->file('image')->extension();
            $random = Str::random(30);
            $dt = Carbon::now()->timestamp;
            $newFileName = $random . '-' . $dt . '.' . $extension;
            $img->save($path.'/'.$newFileName);
            if(file_exists($oldImagePath)){
                File::delete($oldImagePath);
            }
        }

        $updatePost->update([
            'user_id' => Auth::id(),
            'post_category_id' => (int)request()->category,
            'title' => request()->title,
            'image' => $newFileName,
            'description' => request()->description,
            'slug' => Str::slug(request()->title)
        ]);

        $updatePost->getTags()->sync(request()->tags);

        return response()->json(['msg' => 'Successfully updated.']);
    }

    public function deletePost($cmsPostId)
    {
        $msg = "Some thing went wrong!";
        $code = 400;
        $updatePost = Post::find($cmsPostId);

        if (!empty($updatePost)) {
            // unlink( '/assets/website/blog/images/' . $updatePost->image);
            $updatePost->getTags()->detach();
            $updatePost->delete();
            $msg = "Successfully Delete record!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }

    public function changePostActiveStatus($cmsPostId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $post = Post::find($cmsPostId);

        if (!empty($post)) {
            $msgText = $post->is_active ? "in-active" : "active";
            $post->update(['is_active' => $post->is_active ? 0 : 1]);
            $msg = "Post successfully {$msgText}!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }

    public function changePostFeaturedStatus($cmsPostId)
    {
        $msg = 'Something went wrong.';
        $code = 400;
        $post = Post::find($cmsPostId);

        if (!empty($post)) {
            $msgText = $post->is_featured ? "not-featured" : "featured";
            $post->update(['is_featured' => $post->is_featured ? 0 : 1]);
            $msg = "Post successfully {$msgText}!";
            $code = 200;
        }

        return response()->json(['msg' => $msg], $code);
    }
}
