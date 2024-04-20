<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = "posts";

    protected $fillable = [
        'user_id',
        'post_category_id',
        'title',
        'image',
        'slug',
        'description',
        'is_active',
        'is_featured'
    ];

    public function getCategory()
    {
        return $this->belongsTo(PostCategory::class,'post_category_id','id');
    }

    public function getTags()
    {
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id')->withTimestamps();
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
