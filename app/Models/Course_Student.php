<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_Student extends Model
{
    protected $table = 'course_student';

    protected $fillable = ['student_id', 'course_id', 'enrolled_at'];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
