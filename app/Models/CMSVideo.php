<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'Agriculture' => 'App\Models\CMSAgriculture',
    'Health' => 'App\Models\CMSHealth',
    // 'Stories' => 'App\Models\CMSStories'
]);
class CMSVideo extends Model
{

    protected $table = "cms_gallery_videos";

    protected $fillable = [
        'video_name',
        'videoable_id',
        'videoable_type',
        'path'
    ];

    const CATEGORIES = [
        'Agriculture',
        'Health',
        // 'Stories'
    ];

    public function getVideoTable()
    {
        return $this->morphTo(__FUNCTION__, 'videoable_type', 'videoable_id');
    }

    public function getVideoUrlAttribute()
    {
        return $this->path . '/' . $this->video_name;
    }
}
