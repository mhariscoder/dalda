<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use SoftDeletes;

    protected $table = "post_categories";

    protected $fillable = [
        'name',
        'slug'
    ];
    protected $dates = [
        'deleted_at'
    ];

    public function getPosts()
    {
        return $this->hasMany(Post::class,'post_category_id','id');
    }
}
