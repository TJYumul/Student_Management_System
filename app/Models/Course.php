<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function students() 
    {
        return $this->belongsToMany(Student::class, 'course_student')
                    ->withPivot('enrolled_at')
                    ->withTimestamps();
    }
}
