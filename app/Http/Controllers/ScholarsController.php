<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ScholarsController extends Controller
{
     public function join(){
              $scholarships= DB::table('enrollments')
              
             ->join('student_records','student_records.id','=','enrollments.student_rec_id')
             ->join('scholarships','scholarships.id','=','enrollments.scholarship_id')
             ->join('student_pds','student_records.id','=','student_pds.student_id')
             ->join('degrees','degrees.id', '=' ,'student_records.degree_id')
             ->join('colleges','colleges.id', '=' ,'student_records.college_id')
             ->join('preferences','preferences.id','=','enrollments.pref_id')
             ->join('cys','cys.id','=','preferences.cy_id')
             
              ->select('enrollments.section', 'scholarships.scholarship','student_pds.fname','student_pds.lname'
                          ,'student_pds.mname','degrees.abbr','colleges.collegeabbr','preferences.status','cys.cy')
              ->get(['enrollments.section', 'scholarships.scholarship','student_pds.fname','student_pds.lname'
              ,'student_pds.mname','degrees.abbr','colleges.collegeabbr','preferences.status','cys.cy']);
        
              return view('admin.scholars', compact('scholarships'));
          }
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if($request->scholarships)
      {
       $data = DB::table('enrollments')
        ->join('student_records','student_records.id','=','enrollments.student_rec_id')
        ->join('scholarships','scholarships.id','=','enrollments.scholarship_id')
        ->join('student_pds','student_records.id','=','student_pds.student_id')
        ->join('degrees','degrees.id', '=' ,'student_records.degree_id')
        ->join('colleges','colleges.id', '=' ,'student_records.college_id')
        ->join('preferences','preferences.id','=','enrollments.pref_id')
        ->join('cys','cys.id','=','preferences.cy_id')

         ->select('enrollments.section', 'scholarships.scholarship','student_pds.fname','student_pds.lname'
         ,'student_pds.mname','degrees.abbr','colleges.collegeabbr','preferences.status','student_pds.sex','cys.cy')
         ->where('enrollments.colleges', $request->colleges);
      }
      else
      {
       $data = DB::table('enrollments')
       ->join('student_records','student_records.id','=','enrollments.student_rec_id')
       ->join('scholarships','scholarships.id','=','enrollments.scholarship_id')
       ->join('student_pds','student_records.id','=','student_pds.student_id')
       ->join('degrees','degrees.id', '=' ,'student_records.degree_id')
       ->join('colleges','colleges.id', '=' ,'student_records.college_id')
       ->join('preferences','preferences.id','=','enrollments.pref_id')
       ->join('cys','cys.id','=','preferences.cy_id')

        ->select('enrollments.section', 'scholarships.scholarship','student_pds.fname','student_pds.lname'
        ,'student_pds.mname','degrees.abbr','colleges.collegeabbr','preferences.status','student_pds.sex','cys.cy');
      }
      return DataTables::of($data)->make(true);
      // return datatables()->of($data)->make(true);
     }

     $scholarships = DB::table('colleges')
        ->select("*")
        ->get();

   
     return view('admin.scholars', compact('scholarships'));
    }

//     public function join(){
//       $scholarships= DB::table('enrollments')
      
//      ->join('student_records','student_records.id','=','enrollments.student_rec_id')
//      ->join('scholarships','scholarships.id','=','enrollments.scholarship_id')
//      ->join('student_pds','student_records.id','=','student_pds.student_id')
//      ->join('degrees','degrees.id', '=' ,'student_records.degree_id')
//      ->join('colleges','colleges.id', '=' ,'student_records.college_id')
//      ->join('preferences','preferences.id','=','enrollments.pref_id')
//      ->join('cys','cys.id','=','preferences.cy_id')
     
//       ->select('enrollments.section', 'scholarships.scholarship','student_pds.fname','student_pds.lname'
//                   ,'student_pds.mname','degrees.abbr','colleges.collegeabbr','preferences.status','cys.cy')
//       ->get(['enrollments.section', 'scholarships.scholarship','student_pds.fname','student_pds.lname'
//       ,'student_pds.mname','degrees.abbr','colleges.collegeabbr','preferences.status','cys.cy']);

//       return view('admin.scholars', compact('scholarships'));
//   }
}