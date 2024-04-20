<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSHealth extends Model
{

    protected $table = "cms_healths";

    public const HEALTH_ID = 1;

    public const IMAGE_PATH = '/assets/website/images/pages/health/';

    protected $fillable = [
        'heading',
        'description',
        'section1_image1',
        'section1_content1',
        'section1_image2',
        'section1_content2',
        'section2_content',
        'content',
        'banner',
        'banner_heading'

    ];

    public function getImages()
    {
        return $this->morphMany(CMSImage::class, 'getImageTable', 'imageable_type', 'imageable_id', 'id');
    }

    public function getVideos()
    {
        return $this->morphMany(CMSVideo::class, 'getVideoTable', 'videoable_type', 'videoable_id', 'id');
    }


     public function hospitals()
    {
        return $this->hasMany(CmsHealthHospital::class,'health_id');
    }
}
