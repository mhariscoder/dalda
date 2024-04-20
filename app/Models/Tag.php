<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $table = "tags";

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function getPosts()
    {
        return $this->belongsToMany(Post::class,'post_tag','tag_id','post_id')->withTimestamps();
    }
}
