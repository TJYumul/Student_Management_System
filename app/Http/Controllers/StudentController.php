<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(['message' => Student::all()], 200); 
    }

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

    public function show(string $id)
    {
        return Student::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->all());

        return response()->json($student, 200);
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json(null, 200);
    }
}
