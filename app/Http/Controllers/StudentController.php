<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function listele(Request $request){     
      $column=$request->query('column','sid');
      $sort=$request->query('sort','asc');
      $page=$request->query('page',"1");
      $filter=false;
      
      $students=Student::orderBy($column,$sort)->paginate(5);
      $students->appends(['column'=>$column,
                          'sort'=>$sort,
                          'page'=>$page]);
      
      Session::put('student_url',request()->fullUrl());

      return view("index",compact('students','sort','column','filter'));
    }

    public function ara(Request $request,$column,$sort){
      $sid=$request->query('sid');
      $fname=$request->query('fname');
      $lname=$request->query('lname');
      $birthplace=$request->query('birthplace');
      $birthDate=$request->query('birthDate');
      $page=$request->query('page',"1");
      $filter=true;

      $students=Student::where([
                                ['sid','like',$sid==''?'%':$sid],
                                ['fname','like',$fname==''?'%':$fname], 
                                ['lname','like',$lname==''?'%':$lname], 
                                ['birthplace','like',$birthplace==''?'%':$birthplace], 
                                ['birthDate','like',$birthDate==''?'%':$birthDate] 
                            ])->orderBy($column,$sort)->paginate(5);
      $students->appends(['sid'=>$sid,
                          'fname'=>$fname,
                          'lname'=>$lname,
                          'birthplace'=>$birthplace,
                          'birthDate'=>$birthDate,
                          'page'=>$page]);

      Session::put('student_url',request()->fullUrl());

      return view("index",compact('students','sort','column','filter','sid','fname','lname','birthplace','birthDate'));
    }

    public function yeni(){
        return view("create");
    }

    public function düzenle(Request $request){
        $sid=$request->query('sid');

        $student=Student::where('sid',$sid)->first();

        return view("edit",compact('student'));
    }

    public function sil(Request $request){
        $sid=$request->query('sid');

        Student::where('sid',$sid)->delete();

        return redirect(session('student_url'));
    }

    public function güncelle(Request $request,$sid){
        $student=Student::whereSid($sid);
        $input=$request->except('_token');
        $student->update($input);

        return redirect(session('student_url'));
    }

    public function oluştur(Request $request){
        $input=$request->all();
        Student::create($input);

        return redirect(session('student_url'));
    }
}
