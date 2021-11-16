@extends('layouts.master')

@section('main')
<div class="row">
       


          <div class="col-md-12">
              
          @if(session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif
            <div class="card">
              <div class="card-header"> 
              <a href="{{route  ('scholarship_detail.export_mapping') }}" class="btn btn-primary float-right"> <i class="fas fa-file-export"></i>Export
      
              </a>
              <h2> Scholarships </h2>
              </div>
              <!-- @if(session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif
               -->
               <div>
               <a href="{{ route('scholarship.create') }}"  type="submit" class="btn btn-dark " >Add Scholarship</a>
               </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                      <th>ID</th>
                      <th>Scholarship  Type</th>
                      <th>Scholarship</th>
                      <th>Sem Charged</th>
                      <th>Funded  By</th>
                      <th>Applicable Policy</th>
                      <th>Qualification</th>
                      <th>Amount of  Grant/Stipend</th>
                      <th>General Guidelines</th>
                      <th>Contact Information</th>
                      <th>Status</th>
                      <th>Action</th>
                  <!--    <th>Delete</th> -->
                    </thead>
                    <tbody>
                      @foreach ( $scholarships as $scholarships)
                     
                      <tr>
                         <td>{{ $scholarships->id }}</td> 

                        @if ($scholarships->scholarship_type == 0)
                        <td>Other Study Grants</td>  
                        @elseif ($scholarships->scholarship_type == 1)
                        <td>Academic Scholars</td>
                        @elseif ($scholarships->scholarship_type == 2)
                        <td>Student Assistantship Programs</td>
                        @elseif ($scholarships->scholarship_type == 3)
                        <td>Other Government Funded Scholarship with MOA/JMC to MMSU</td>
                        @else
                        <td>--NONE--</td>
                        @endif

                        <td>{{ $scholarships->scholarship }}</td>


                        @if ($scholarships->sem_charged == 1)
                        <td>1st Semester</td>
                        @elseif($scholarships->sem_charged == 2)
                        <td> 2nd Semester</td>
                        @elseif($scholarships->sem_charged == 3)
                        <td>Mid Year</td>
                        @elseif($scholarships->sem_charged == 12)
                        <td>1st Semester <br> 2nd Semester</td>
                        @elseif( $scholarships->sem_charged == 123)
                        <td>1st Semester <br>2nd Semester <br> Mid Year</td>
                        @else
                        <td>--NONE--</td>
                        @endif

                        <td>{{ $scholarships->funded_by }}</td>  
                        <td>{{ $scholarships->appli_poli}}</td>  
                        <td>{{$scholarships->qualification }}</td>  
                        <td>{{ $scholarships->amount_of_grant }}</td>  
                        <td>{{ $scholarships->gen_guideline }}</td>  
                        <td>{{ $scholarships->contact_info }}</td>  

                               
                        @if($scholarships->active == 1)
                        <td>Active</td>
                      @else ($scholarships->active == 0)
                      <td> Inactive</td>
                      @endif
                   

                        <td>
                      
                          <a href=" {{ route('scholarship.edit',$scholarships->id)}}" class="btn btn-warning btn-sm btn-icon">
                          <i class="far fa-edit"></i>
                          </a>
                          
                        </td>

                        <td>
                          <!--
                          <form action="/scholarship-delete/{{ $scholarships->id }}" method="POST">
                          {{ csrf_field() }}
                          {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          -->
                        </td>
                    </tr>
                    @endforeach
                   
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
                </table>
            </div>
@endsection
