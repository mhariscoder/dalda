<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMSMediaCenter extends Model
{
    use SoftDeletes;

    protected $table = "cms_media_center";

    protected $fillable = [
        'title',
        'description',
        'type',
        'file',
    ];
}
