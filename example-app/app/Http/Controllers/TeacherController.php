<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Student;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function addTeacher(){
        return view('add-teacher');
    }
    public function saveTeacher(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $designation = $request->designation;
        $subject = $request->subject;
        $joiningdate = $request->joiningdate;

        $password = $request->password;
            

        $tea = new Teacher();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/teachers', $filename);
            $tea->image = $filename;
        }
        $tea->name = $name;
        $tea->subject = $subject;
        $tea->password = $password;
        $tea->designation = $designation;
        $tea->email = $email;
        $tea->joiningdate = $joiningdate;
        $tea->save();

        return redirect()->back()->with('success','Teacher Added Successfully');
    }
    public function filterTeacher(Request $request){
        $subject = $request->input('subject');
        $teachers = Teacher::query();
        if($subject){
            $teachers->where('subject',$subject);
        }
        $teachers = $teachers->get();
        $students = Student::get();
        return view('admin',compact('students','teachers'));
    }

    public function EditTeacher($id){
        $data = Student::where('id','=',$id)->first();
        return view('edit-teaceher',compact('data'));
    }

    public function deleteTeacher($id){
        Teacher::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Teacher deleted Successfully');
    }
}