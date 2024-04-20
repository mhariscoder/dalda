<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use SoftDeletes;

    protected $table = "test_results";

    protected $fillable = [
        'user_id',
        'upload_document_id',
        'marks',
        'percentage'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getExam()
    {
        return $this->belongsTo(UploadDocument::class,'upload_document_id','id');
    }
}
