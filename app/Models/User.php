<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable, SoftDeletes;

    protected $table = "users";
    protected $guard_name = 'web';
    protected $with = 'getTestResults';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'cnic',
        'email',
        'password',
        'contact',
        'gender',
        'dob',
        'profile_picture',
        'profile_detail',
        'marital_status',
        'postal_address',
        'father_name',
        'mother_name',
        'verification_token',
        'remember_token',
        'is_block',
        'is_verified',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfilePictureAttribute($value)
    {
        return !empty($value) ? asset('assets/images/user_profile/'.$value) : asset("assets/images/user_profile/not_available.jpg");
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function  getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAppliedScholarships()
    {
        return $this->hasMany(ApplyScholarShip::class, 'user_id','id');
    }

    public function getClaimedScholarships()
    {
        return $this->hasMany(ClaimScholarShip::class, 'user_id','id');
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function highPotentialStudent()
    {
        return $this->hasOne(HighPotentialStudent::class, 'id', 'student_id');
    }

    public function highAchieversStudent()
    {
        return $this->hasOne(HighAchiversStudent::class, 'id', 'student_id');
    }

    public function getTestResults()
    {
        return $this->hasOne(TestResult::class, 'user_id', 'id');
    }

}
