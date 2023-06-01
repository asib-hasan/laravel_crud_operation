<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = Student::get();
        return view('student-list',compact('data'));
    }
    public function addStudent(){

        return view('add-student');
    }
    public function saveStudent(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=> 'required|email',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;

        $stu = new Student();
        $stu->name = $name;
        $stu->email = $email;
        $stu->address = $address;
        $stu->phone = $phone;
        $stu->save();

        return redirect()->back()->with('success','Student Added Successfully');
    }

    public function EditStudent($id){
        $data = Student::where('id','=',$id)->first();
        return view('edit-student',compact('data'));
    }

    public function updateStudent(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=> 'required|email',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;

        Student::where('id','=',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
        ]);

        return redirect()->back()->with('success','Student updated Successfully');
    }
    public function deleteStudent($id){
        Student::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Student deleted Successfully');
    }
}
