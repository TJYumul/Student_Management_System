<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /api/students → list all students
    public function index()
    {
        return response()->json(['message' => Student::all()], 200); // php.ini extension=pdo_sqlite extension=sqlite3
    }

    // POST /api/students → create a new student
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'address'    => 'required'
        ]);

        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

    // GET /api/students/{id} → show student by ID
    public function show(string $id)
    {
        return Student::findOrFail($id);
    }

    // PUT /api/students/{id} → update student
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->all());

        return response()->json($student, 200);
    }

    // DELETE /api/students/{id} → delete student
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json(null, 200);
    }
}
