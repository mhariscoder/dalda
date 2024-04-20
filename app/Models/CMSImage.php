<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'Agriculture' => 'App\Models\CMSAgriculture',
    'Health' => 'App\Models\CMSHealth',
]);

class CMSImage extends Model
{
    use SoftDeletes;

    protected $table = "cms_gallery_images";

    protected $fillable = [
        'image_name',
        'imageable_id',
        'imageable_type',
        'path'
    ];

    const CATEGORIES = ['Agriculture','Health'];

    public function getImageTable()
    {
        return $this->morphTo(__FUNCTION__, 'imageable_type', 'imageable_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->path . '/' . $this->image_name;
    }
}
