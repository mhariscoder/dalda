<?php

namespace App\Models;

use App\Models\CmsHealth;
use Illuminate\Database\Eloquent\Model;

class CmsHealthHospital extends Model
{
    // protected $table = 'cms_health_hospitals';

    protected $fillable = ['name', 'image','sort_order'];

    public const IMAGE_PATH = '/assets/website/images/pages/health/';

    public function setHospitals()
    {
        return $this->belongsTo(CmsHealth::class);
    }

    public function getImageUrlAttribute()
    {
        return asset(self::IMAGE_PATH . $this->image);
    }
}
