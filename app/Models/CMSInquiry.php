<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSInquiry extends Model
{
    protected $table = "inquiries";

    protected $fillable = [
        'name',
        'email',
        'contact',
        'message',
        'organization',
        'student_id'
    ];
}
