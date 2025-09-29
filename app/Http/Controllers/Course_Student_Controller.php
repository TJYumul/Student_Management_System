<?php

namespace App\Http\Controllers;

use App\Models\Course_Student;
use Illuminate\Http\Request;

class Course_Student_Controller extends Controller
{
    public function index()
    {
        return Course_Student::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
            'enrolled_at'=> 'required|date'
        ]);

        $courseStudent = Course_Student::create($request->all());

        return response()->json($courseStudent, 201);
    }

    public function show(string $id)
    {
        return Course_Student::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $course_student = Course_Student::findOrFail($id);
        
        $course_student->update($request->all());

        return response()->json($course_student, 200);
    }

    public function destroy(string $id)
    {
        $course_student = Course_Student::findOrFail($id);

        $course_student->delete();

        return response()->json(null,200);
    }
}
