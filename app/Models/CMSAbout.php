<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSAbout extends Model
{
    use SoftDeletes;

    protected $table = "cms_about";

    public const ABOUT_ID = 1;

    protected $fillable = [
        'banner_heading',
        'section1_heading',
        'section1_description',
        'section2_content1',
        'section2_content2',
        'section3_heading',
        'section3_description',
        'section4_heading1',
        'section4_description1',
        'section4_heading2',
        'section4_description2',
        'banner',
        'section2_image1',
        'section2_image2',
        'section3_image',
        'section4_heading2',
        'section4_image1',
        'section4_image2',
        'created_by',
        'updated_by',
    ];
    protected $dates = ['deleted_at'];
}
