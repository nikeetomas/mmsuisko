<?php

namespace App\Http\Controllers;

use App\Exports\ScholarshipDetailsExportMapping;
use Illuminate\Support\Facades\DB;
use App\Models\Scholarship;
use App\Models\ScholarshipDeduction;
use App\Models\ScholarshipDetail;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships= DB::table('scholarship_details')
           ->join ('scholarships','scholarship_details.scholarship_id','=','scholarships.id')
        //    -> join ('scholarship_deductions','scholarship_deductions.id','=','scholarship_deductions.scholarship_id')
           ->select(['scholarship_details.*',
           'scholarships.id',
           'scholarships.scholarship_type',
           'scholarships.scholarship',
        //    'scholarships.discount',
           'scholarships.sem_charged',
           'scholarships.funded_by',
           'scholarships.active'])
        //    'scholarship_deductions.percent'])
           ->get();
  
        //    $scholarships= DB::table('scholarships')
        //    ->distinct()
        //    ->join ('scholarship_details','scholarship_details.scholarship_id','=','scholarship_id')
        //    -> join ('scholarship_deductions','scholarship_deductions.id','=','scholarship_deductions.scholarship_id')
        //       ->select(['scholarships.*',
        //       'scholarship_details.appli_poli',
        //       'scholarship_details.qualification',
        //       'scholarship_details.amount_of_grant',
        //       'scholarship_details.gen_guideline',
        //       'scholarship_details.contact_info',
        //       'scholarship_deductions.percent' ])
        //       ->get();
      
   
            return view('admin.scholarship')->with('scholarships',$scholarships);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scholarship = Scholarship::all();
        $scholarshipdetail = ScholarshipDetail::all();
        // $scholarshipdeduction= ScholarshipDeduction::all();

        return view('admin.scholarship-create')->with('scholarship', $scholarship)
                                                ->with('scholarshipdetail',$scholarshipdetail);
                                                // ->with('scholarshipdeduction',$scholarshipdeduction);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scholarships = new Scholarship;
        
       
        $scholarships->scholarship_type = $request-> scholarship_type;
        $scholarships->scholarship = $request->scholarship;
        $scholarships->sem_charged = $request->sem_charged;
        $scholarships->funded_by = $request->funded_by;
        $scholarships->active = $request->active;
        $scholarships->save();
        
        $scholarship_id = $scholarships->id;

        $sdetails = new ScholarshipDetail;

        $sdetails->scholarship_id=$scholarship_id;
        $sdetails->appli_poli = $request->appli_poli;
        $sdetails->qualification = $request->qualification;
        $sdetails->amount_of_grant = $request->amount_of_grant;
        $sdetails->gen_guideline = $request->gen_guideline;
        $sdetails->contact_info = $request->contact_info;
        $sdetails->save();

    //    $sdeduction_id = $scholarships->id;


    
        return redirect('/scholarship')->with('status', 'Data Added Successfully');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sdetail= DB::table('scholarship_details')  
             ->where('scholarship_details.scholarship_id','=', $id)
             ->join('scholarships', 'scholarship_details.scholarship_id','=','scholarships.id')
             ->select(['scholarship_details.*',
             'scholarships.id',
             'scholarships.scholarship_type',
             'scholarships.scholarship',
             'scholarships.discount',
             'scholarships.sem_charged',
             'scholarships.funded_by',
             'scholarships.active'])
             ->first();
              
             
        //    $sdetail= DB::table('scholarships')
        //     ->where('scholarships.id','=',$id)
        //    ->join ('scholarship_details','scholarship_details.scholarship_id','=','scholarship_id')
        //       ->select(['scholarships.*',
        //       'scholarship_details.appli_poli',
        //       'scholarship_details.qualification',
        //       'scholarship_details.amount_of_grant',
        //       'scholarship_details.gen_guideline',
        //       'scholarship_details.contact_info'])
        //       ->first();
            return view('admin.scholarship-edit')->with('sdetail', $sdetail);
           ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id){
            
                $scholarships = Scholarship::find($id);
               
              
                $scholarships->scholarship_type = $request-> scholarship_type;
                $scholarships->scholarship = $request->scholarship;
                $scholarships->sem_charged = $request->sem_charged;
                $scholarships->funded_by = $request->funded_by;
                $scholarships->active = $request->active;
                $scholarships->save();
                
            
                $scholarship_id = $scholarships->id;

               
              //  $sdetails = ScholarshipDetail::find( $scholarship_id, ['scholarship_id']);

                $sdetails = ScholarshipDetail::where('scholarship_id', $scholarship_id)
                ->update([
                    'appli_poli' =>  $request->appli_poli,
                    'qualification' => $request->qualification,
                    'amount_of_grant' => $request->amount_of_grant,
                    'gen_guideline' => $request->gen_guideline,
                    'contact_info' => $request->contact_info,
                ]);
               
             
             });
        
  
                return redirect('/scholarship')->with('status', 'Your Data is Updated');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function export_mapping()
    {
        return Excel::download(new ScholarshipDetailsExportMapping(),'scholarshipprogram.xlsx');
      
    }

}