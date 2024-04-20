<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        if (request()->has('tag')) {
            $allPosts = Tag::where('slug',request('tag'))->firstORFail()->getPosts;
        } else {
            $allPosts = $posts->filter(function ($val){
                return $val->where('is_active',1);
            })->take(5);
        }
        $featuredPosts = $posts->filter(function ($val){
           return $val->where('is_featured',1);
        })->take(5);
        $tags = Tag::all();
        $categories = PostCategory::all();
        return view('website.blog.index', compact('allPosts','featuredPosts', 'categories', 'tags'));
    }

    public function postDetail($slug)
    {
        $post = Post::with(['getTags', 'getCategory'])->where('slug', $slug)->first();
        return view('website.blog.detail', compact('post'));
    }

    public function getPostByTag($slug)
    {
        if (request()->has('tag')) {
            $posts = Tag::where('slug', $slug)->getPosts();
            $tags = Tag::all();
            $categories = PostCategory::all();
        } else {
            abort(404);
        }
        return view('website.blog.index', compact('posts', 'categories', 'tags'));
    }
}
