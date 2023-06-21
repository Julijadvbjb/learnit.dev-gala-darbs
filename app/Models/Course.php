<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lecturer;


class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'lecturer_id',
        'description',
    ];
// Course.php

public function user()
{
    return $this->belongsTo(User::class);
}

public function enrolledUsers()
{
    return $this->belongsToMany(User::class, 'enrollments')->withPivot('completed');
}

public function assignments()
{
    return $this->hasMany(Assignment::class);
}

    public function category()
{
    return $this->belongsTo(Category::class);
}
public function lecturer()
{
    return $this->belongsTo(Lecturer::class);
}

}
