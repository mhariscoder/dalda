<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSHospital extends Model
{
    use SoftDeletes;

    protected $table = "cms_hospital";

    protected $fillable = [
        'hospital_name',
        'web_url',
        'description'
    ];

    public function scopeHealthFilter(Builder $query,array $filters)
    {
        $query->when(isset($filters['search']) ? $filters['search'] : false,function ($query,$search){
            $query->where('hospital_name','like','%'.$search.'%');
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
}
