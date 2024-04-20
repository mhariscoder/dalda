<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSContact extends Model
{
    use SoftDeletes;

    protected $table = "cms_contact";

    public const CONTACT_US = 1;

    public const IMAGE_PATH = '/assets/website/images/pages/contact/';

    protected $fillable = [
        'title',
        'sub_heading',
        'banner',
        'banner_heading',
        'address',
        'office_no',
        'email',

    ];
    protected $dates = ['deleted_at'];
}
