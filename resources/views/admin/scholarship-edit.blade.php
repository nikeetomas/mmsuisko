@extends('layouts.master')

@section('main')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Scholarship</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12"> 
                                <form action="{{route('scholarship.update', $sdetail->id )}} " method="POST">
                                
                                @csrf
                                @method('PUT')


                                 <div class="form-group">
                                 <label>Scholarship Type</label>
                            <!--     <input type="text" name="scholarship_type" value="{{ $sdetail->scholarship_type }}" class="form-control"> -->
                                 <select type="text" name="scholarship_type" class="form-control"  value="{{ $sdetail->scholarship_type }}"  class="form-control" >
                                    
                                     <option value="1"> Other Study Grants </option>
                                     <option value="2">Academic Scholars </option>
                                     <option value="3"> Student Assistantship Programs </option>
                                     <option value="4"> Other Government Funded Scholarship with MOA/JMC to MMSU </option>
                                 </select>
                            </div>

                                 <div class="form-group">
                                 <label>Scholarship</label>
                                <input type="text" name="scholarship" value="{{ $sdetail->scholarship }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Discount</label>
                                <input type="text" name="discount" value="{{ $sdetail->discount }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Sem Charged</label>
                                <!-- <input type="text" name="sem_charged" value="{{$sdetail->sem_charged }}" class="form-control"> -->
                                 <select name="sem_charged" class="form-control" value="{{$sdetail->sem_charged }}">
                               
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="12">1st & 2nd Semester</option>
                                        <option value="123">1st, 2nd Semester & Midyear</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label>Funded by</label>
                                <input type="text" name="funded_by" value="{{ $sdetail->funded_by }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Applicable Policy</label>
                                <input type="text" name="appli_poli" value="{{    $sdetail->appli_poli }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" name="qualification" value="{{    $sdetail->qualification }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Amount of Grant/Stipend</label>
                                <input type="text" name="amount_of_grant" value="{{    $sdetail->amount_of_grant }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>General Guideline</label>
                                <input type="text" name="gen_guideline" value="{{    $sdetail->gen_guideline }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Contact Information</label>
                                <input type="text" name="contact_info" value="{{    $sdetail->contact_info }}" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Status</label>
                                <!-- <input type="text" name="active" value="{{ $sdetail->active }}" class="form-control"> -->
                                <select name="active" class="form-control"  value="{{ $sdetail->active }}">
                               
                                     <option value="1">Active</option>
                                     <option value="2">Inactive</option>
                                </select>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/scholarship" class="btn btn-danger">Cancel</a>

                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

