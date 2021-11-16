<?php

namespace App\Exports;

use App\Models\ScholarshipDetail;
use App\Models\Scholarship;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ScholarshipDetailsExportMapping implements FromCollection ,ShouldAutoSize,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      //  return ScholarshipDetail::with('scholarship:scholarship_type,scholarship,discount,sem_charged,funded_by,active')->get();
         return ScholarshipDetail::with('scholarship')->get();

    }
    public function map($scholarshipdetail) : array {
        return [
            
        
            $scholarshipdetail->appli_poli,
            $scholarshipdetail->qualification,
            $scholarshipdetail->amount_of_grant,
            $scholarshipdetail->gen_guideline,
            $scholarshipdetail->contact_info,
            // $scholarshipdetail->scholarship->active,
             
        //     $scholarship->scholarship_type,
        //     $scholarship->scholarship,
        //   $scholarship->discount,
        //     $scholarship->sem_charged,
        //   $scholarship->scholarshipdetail->appli_poli,
        //   $scholarship->scholarshipdetail->qualification,
        //   $scholarship->scholarshipdetail->amount_of_grant,
        //   $scholarship->scholarshipdetail->gen_guideline,
        //   $scholarship->scholarshipdetail->contact_info,
        //   $scholarship->active,
        ] ;

    }
    public function headings() : array {
        return [

        //    'Scholarship Type',
        //    'Scholarship Name',
        //    'Discount',
        //    'Semester Charged',
           'Application Pollicy',
           'Qualification',
           'Amount of Grant',
           'General Guideline',
           'Contact Information',
        //    'Status',
        ] ;
    }
}

