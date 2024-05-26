<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounsellingCategory extends Model
{
    protected $fillable = ['title', 'description'];

    public function counselling()
    {
        return $this->hasMany(Counselling::class);
    }
}
