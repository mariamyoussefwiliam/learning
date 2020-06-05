<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\DB;
class studentController extends Controller
{
    public function index()
{
    $data['students']=Student::select('id','name','email','spec')->orderBy('id','DESC')->paginate(8);
    return view('admin.student.index')->with($data);
}


public function create() //add 
{
    return view('admin.student.create');
}


public function store(Request $request)
{

$data = $request->validate([
'name'=>'nullable|string|max:191',
'email'=>'required|email|unique:students',
'spec'=>'nullable|string|max:191',
]);
Student::create($data);
return redirect(route('admin.student.index'));
}




}
