<?php

namespace App\Http\Controllers;

use App\Models\Course_Student;
use Illuminate\Http\Request;

class Course_Student_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Course_Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Course_Student::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course_student = Course_Student::findOrFail($id);
        
        $course_student->update($request->all());

        return response()->json($course_student, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course_student = Course_Student::findOrFail($id);

        $course_student->delete();

        return response()->json(null,200);
    }
}
