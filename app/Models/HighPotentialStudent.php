<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HighPotentialStudent extends Model
{
    //
    protected $table = "high_potential_students";

    protected $guarded = ['id'];

    // protected $with = ['student'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
