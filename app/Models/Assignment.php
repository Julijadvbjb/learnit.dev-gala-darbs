<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'duedate'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    // Assignment.php

public function feedbacks()
{
    return $this->hasMany(Feedback::class);
}
public function submissions()
{
    return $this->hasMany(Enrollment::class);
}
}
