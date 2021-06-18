<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id','desc')->get();
        return view('students',compact('students'));
    }

    public function addStudent(Request $req)
    {
        $student = new Student();
        $student->firstname = $req->firstname;
        $student->lastname = $req->lastname;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->save();
        return response()->json($student);
    }

    public function getStudentById($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function updateStudent(Request $req)
    {
        $student = Student::find($req->id);
        $student->firstname = $req->firstname;
        $student->lastname = $req->lastname;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->save();
        return response()->json($student);
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json(['success' => 'Record has been deleted']);
    }
}
