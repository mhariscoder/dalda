<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    protected $table = "home_heroes";
    protected $fillable = ['sort_order', 'title', 'designation', 'department', 'description', 'image'];
    public function setHeroes()
    {
        return $this->belongsTo(CMSHome::class);
    }
}
