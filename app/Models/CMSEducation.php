<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSEducation extends Model
{
    use SoftDeletes;

    protected $table = "cms_education";

    public const EDUCATION_ID = 1;

    protected $fillable = [
        'banner',
        'banner_heading',
        'section1_heading',
        'section1_description',
        'section2_description',
        'section2_image',
        'section3_heading',
        'section3_description',
        'section3_image',
        'section4_heading',
        'section4_description',
        'section4_image',
        'section5_content',
        'section6_heading',
        'section6_description',
        'section7_heading',
        'section7_description',
        'section7_image',
    ];

    public function scopeEducationFilter(Builder $query,array $filters)
    {
        $query->when(isset($filters['search']) ? $filters['search'] : false,function ($query,$search){
            $query->where('institute_name','like','%'.$search.'%');
        });
    }

    public function getImages()
    {
        return $this->morphMany(CMSImage::class,'getImageTable','imageable_type','imageable_id','id');
    }

    public function getVideos()
    {
        return $this->morphMany(CMSVideo::class,'getVideoTable','videoable_type','videoable_id','id');
    }
    public function hasBoxes()
    {
        return $this->hasMany(CMSEducationBox::class,'education_id');
    }
    public function services()
    {
        return $this->hasMany(CMSEducationServices::class,'education_id');
    }
}
