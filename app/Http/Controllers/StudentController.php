<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return response()->json(['student' => $student], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 422);
        } else {
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();
            return response()->json([
                'message' => 'Student created successfully',
            ]);
        }
    }
}
