<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSHome extends Model
{
    use SoftDeletes;

    protected $table = "cms_home";

    protected $fillable = [
        'banner',
        'banner_mobile',
        'banner_heading',
        'banner_description',
        'section1_heading',
        'section1_description',
        'section1_image',
        'section1_image2',

        'section2_heading',
        'section2_image',
        'card1_heading',
        'card1_description',
        'card2_heading',
        'card2_description',
        'card_section_image',
        'section3_heading',
        'section3_description',
        'section3_sub_heading',
        'section3_sub_description',
        'section3_sub_content',
        'section4_heading',
        'section4_description',
        'section5_heading',
        'section5_description',
        'section6_heading',
        'section6_sub_heading1',
        'section6_sub_description1',
        'section6_sub_image1',
        'section6_sub_link1',
        'section6_sub_heading2',
        'section6_sub_description2',
        'section6_sub_link2',
        'section6_sub_image2',
        'section6_sub_heading3',
        'section6_sub_description3',
        'section6_sub_link3',
        'section6_sub_image3',
    ];
    protected $dates = ['deleted_at'];

    public const HOME_ID = 1;

    public function universityLogos()
    {
        return $this->hasMany(UniversityIcons::class);
    }
    public function heroes()
    {
        return $this->hasMany(HomeHero::class,'home_id');
    }
}
