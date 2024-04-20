<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSVolunteer extends Model
{
    protected $table = "cms_volunteers";

    protected $fillable = [
        'student_name',
        'file',
        'description'
    ];
}
