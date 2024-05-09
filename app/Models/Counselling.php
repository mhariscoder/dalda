<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counselling extends Model
{
    protected $fillable = ['counselling_category_id', 'question', 'answer'];

    public function CounsellingCategory()
    {
        return $this->belongsTo(CounsellingCategory::class);
    } 
}
