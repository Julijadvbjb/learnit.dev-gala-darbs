<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Course;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // The courses that the user has created (as a teacher)
    public function courses() {
        return $this->belongsToMany(Course::class);
    }
    

    // The courses that the user is enrolled in (as a student)

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

public function assignments()
{
    return $this->hasMany(Assignment::class);
}


public function feedbacks()
{
    return $this->hasMany(Feedback::class);
}

}
