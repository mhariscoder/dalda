<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMSScreeningCriteria extends Model
{
    //
    protected $table = 'cms_screening_criteria';

    protected $guarded = ['id'];

    public const SCREENING_CRITERIA_ID = 1;
}
