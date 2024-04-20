<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSEducationBox extends Model
{
    //
    protected $table = 'cms_education_boxes';


    protected $fillable = ['heading','sort_order', 'description'];

    public function setBoxes()
    {
        return $this->belongsTo(CMSEducation::class);
    }
}
