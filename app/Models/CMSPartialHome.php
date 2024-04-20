<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSPartialHome extends Model
{
    use SoftDeletes;

    protected $table = "cms_partial_home";

    protected $fillable = [
        'title',
        'banner',
        'description',
        'created_by',
        'updated_by',
    ];
    protected $dates = ['deleted_at'];
}
