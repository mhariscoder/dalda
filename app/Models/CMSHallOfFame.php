<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSHallOfFame extends Model
{
    protected $table = "cms_hall_of_fames";

    protected $fillable = [
        'user_id',
        'file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
