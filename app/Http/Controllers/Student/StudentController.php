<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function createStudent(Request $request)
    {
        $url = Str::random(40);
        $addStudent = Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'status' => $request->input('status'),
            'address' => $request->input('address'),
            'student_url' => $url,
        ]);
        Session::flash('Added','Data added  Successfully ');
        return redirect('students');
    }

    public function viewStudents()
    {

        $ViewStudents = Student::all();
        return view('Admin.Students.students')->with('students', $ViewStudents);
    }

    public function deleteStudent($id){
       
        $delete = Student::find($id)->delete();
        Session::flash('Deleted','Data delete  Successfully ');
        return redirect()->back();

    }

     public function edit($id){
        $edit = Student::find($id);
        return view('Admin.Students.edit_students')->with('students',$edit);
     }

     public function updateStudent(Request $request,$id){

        $update = Student::find($id);
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->mobile_number = $request->input('mobile_number');
        $update->status = $request->input('status');
        $update->address = $request->input('address');
        $update->update();

        Session::flash('Updated','Data updated  Successfully ');
        return redirect('/students');
        
     }
   

}
