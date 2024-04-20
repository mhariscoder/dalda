<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HighAchieversStudent extends Model
{
    //
    protected $table = "high_achievers_students";

    protected $guarded = ['id'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
