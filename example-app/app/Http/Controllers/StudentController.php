<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    public function index(){
        $students = Student::get();
        $teachers = Teacher::get();
        return view('admin',compact('students','teachers'));
    }
    public function studentPage($id){
        $data = Student::where('id','=',$id)->first();
        return view('student-page',compact('data'));
    }
    public function login(){
        return view('login');
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
        $fathername = $request->fathername;
        $mothername = $request->mothername;
        $blood = $request->blood;
        $dob = $request->dob;
        $gender = $request->gender;
        $class = $request->class;
        $year = $request->year;
        $date = $request->date;
        $password = $request->password;
            

        $stu = new Student();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/students', $filename);
            $stu->image = $filename;
        }
        $stu->name = $name;
        $stu->fathername = $fathername;
        $stu->mothername = $mothername;
        $stu->dob = $dob;
        $stu->blood = $blood;
        $stu->gender = $gender;
        $stu->class = $class;
        $stu->year = $year;
        $stu->password = $password;
        $stu->date = $date;
        $stu->email = $email;
        $stu->address = $address;
        $stu->phone = $phone;
        $stu->mothername=$mothername;
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/students', $filename);
            $image = $filename;
        }
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $fathername = $request->fathername;
        $mothername = $request->mothername;
        $blood = $request->blood;
        $dob = $request->dob;
        $gender = $request->gender;
        $class = $request->class;
        $year = $request->year;
        $date = $request->date;

        Student::where('id','=',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'fathername'=>$fathername,
            'mothername'=>$mothername,
            'blood'=>$blood,
            'dob'=>$dob,
            'gender'=>$gender,
            'class'=>$class,
            'year'=>$year,
            'date'=>$date,
            'image'=>$image
        ]);

        return redirect()->back()->with('success','Student updated Successfully');
    }
    public function deleteStudent($id){
        Student::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Student deleted Successfully');
    }
    public function filterStudent(Request $request){
        $class = $request->input('class');
        $gender = $request->input('gender');

        $students = Student::query();
        if($class){
            $students->where('class',$class);
        }
        if($gender){
            $students->where('gender',$gender);
        }
        $teachers = Teacher::get();
        $students = $students->get();
        return view('admin',compact('students','teachers'));
    }

    public function authen(Request $request){
        $role = $request->role;

    }
}
