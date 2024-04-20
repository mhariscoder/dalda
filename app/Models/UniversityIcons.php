<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniversityIcons extends Model
{
    //
    protected $guarded = ['id'];

    public const IMAGE_PATH = '/assets/website/images/pages/university-icons/';

    public function home()
    {
        return $this->belongsTo(CMSHome::class);
    }
}
