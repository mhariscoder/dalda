<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UploadDocument extends Model
{
    protected $table = "upload_documents";

    protected $fillable = [
        'title',
        'type',
        'name',
        'description'
    ];
    protected $appends = ['short_date'];


    public function getShortDateAttribute()
    {
        return Carbon::parse($this->created_at)->isoFormat('dddd MMMM Do YYYY');
    }
}
