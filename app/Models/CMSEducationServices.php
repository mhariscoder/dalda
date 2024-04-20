<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSEducationServices extends Model
{

    protected $table = 'cms_education_services';

    protected $fillable =['heading','sort_order', 'description','image'];

    public function setServices()
    {
        return $this->belongsTo(CMSEducation::class);
    }
}
