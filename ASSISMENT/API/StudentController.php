<?php
	//Step 3: Create API Controller:

//Command to create controller:--  php artisan make:controller Api\StudentController

 //app/Http/Controllers/Api/StudentController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller {
    
//	Create Student Record API (POST):

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string',
            'course' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $student = Student::create($request->all());
        return response()->json(['message' => 'Student Created Successfully', 'data' => $student], 201);
    }

// Fetch All Students API (GET):

    public function index() {
        return response()->json(Student::all(), 200);
    }

// Fetch Single Student API (GET):

    public function show($id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student Not Found'], 404);
        }
        return response()->json($student, 200);
    }

// Update Student API (PUT):

    public function update(Request $request, $id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student Not Found'], 404);
        }

        $student->update($request->all());
        return response()->json(['message' => 'Student Updated Successfully', 'data' => $student], 200);
    }


// Delete Student API (DELETE):

    public function destroy($id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student Not Found'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Student Deleted Successfully'], 200);
    }
}
?>