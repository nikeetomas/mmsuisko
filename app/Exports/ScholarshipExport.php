<?php

namespace App\Exports;

use App\Models\ScholarshipDetail;
use  Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;


class ScholarshipExport implements FromCollection,ShouldAutoSize,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    return ScholarshipDetail::with('scholarship')->get();    
    }

    public function map($sdetail):array{
        return[
            $sdetail->scholarship->scholarship_id,
            $sdetail->scholarship->scholarship_type,
            $sdetail->scholarship->scholarship,
            $sdetail->scholarship->discount,
            $sdetail->scholarship->sem_charged,
            $sdetail->appli_poli,
            $sdetail->qualification,
            $sdetail->amount_of_grant,
            $sdetail->gen_guideline,
            $sdetail->contact_info,
            $sdetail->scholarship->active,
        ];
    }
}
