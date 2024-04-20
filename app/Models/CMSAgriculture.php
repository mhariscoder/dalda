<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CMSImage;
use App\Models\CMSVideo;

class CMSAgriculture extends Model
{
    use SoftDeletes;

    protected $table = "cms_agriculture";

    public const AGRICULTURE_ID = 1;

    public const IMAGE_PATH = '/assets/website/images/pages/agriculture/';

    protected $fillable = [
        'heading',
        'description',
        'section1_image1',
        'section1_content1',
        'section1_image2',
        'section1_content2',
        'section2_image',
        'section2_content',
        'section3_heading',
        'section3_content',
        'section4_image',
        'section4_content',
        'banner',
        'banner_heading'


    ];

    public function scopeAgricultureFilter(Builder $query, array $filters)
    {
        $query->when(isset($filters['search']) ? $filters['search'] : false, function ($query, $search) {
            $query->where('university_name', 'like', '%' . $search . '%');
        });
    }

    public function getImages()
    {
        return $this->morphMany(CMSImage::class, 'getImageTable', 'imageable_type', 'imageable_id', 'id');
    }

    public function getVideos()
    {
        return $this->morphMany(CMSVideo::class, 'getVideoTable', 'videoable_type', 'videoable_id', 'id');
    }
}
