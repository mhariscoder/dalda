<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessToApply extends Model
{
    //
    protected $table = 'process_to_applies';

    protected $guarded = ['id'];

    public const PROCESS_TO_APPLY_ID = 1;
}
