<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table = "installments";

    protected $guarded = [];

    public function claimApp()
    {
        return $this->belongsTo(ClaimScholarShip::class,'claim_id','id');
    }
}
