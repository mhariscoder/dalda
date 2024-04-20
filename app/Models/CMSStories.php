<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSStories extends Model
{
    //
    protected $table = "cms_stories";

    protected $guarded = ['id'];

    public function getVideos()
    {
        return $this->morphMany(CMSVideo::class, 'getVideoTable', 'videoable_type', 'videoable_id', 'id');
    }
}
