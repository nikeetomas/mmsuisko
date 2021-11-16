@extends('layouts.master')

@section('title')
    Student Scholarships Records | MMSU Scholarship
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <h4 class="card-title"> Student Scholarships Records </h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                    <th>First <br> Name</th>  
                    <th>Last <br> Name</th> 
                    <th>Middle <br> Name</th>  
                    <th>Section</th>
                    <th>Degree</th>

                    <th>
                      <select name="collegeabbr" id="collegeabbr" class="form-control">
                        <option value="">College</option>
                          @foreach($scholarships as $row)
                            <option value="{{ $row->collegeabbr }}">
                              {{ $row->collegeabbr }}
                            </option>
                          @endforeach

                      </select>
                    </th>

                    <th>Status</th>
                    <th>Gender</th>
                    <th>School <br> Year</th>

                    <th>
                      <select name="scholarship" id="scholarship" class="form-control">
                        <option value="">Scholarship</option>
                          @foreach($scholarships as $row)
                            <option value="{{ $row->scholarship}}">
                              {{ $row->scholarship }}
                            </option>
                          @endforeach

                      </select>
                    </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ( $scholarships as $row)
                      <tr>
                         <td>{{ $row->fname }}</td>
                         <td>{{ $row->lname }}</td>
                         <td>{{ $row->mname }}</td>
                         <td>{{ $row->section }}</td>
                         <td>{{ $row->abbr}}</td>
                         <td>{{ $row->collegeabbr}}</td>


                          @if($row->status == 0)
                            <td>Single</td>
                          @elseif($row->status == 1)
                            <td>Married</td>
                          @elseif($row->status == 2)
                            <td>Widowed</td>
                          @else
                            <td>--NONE--</td>
                          @endif

                  
                        @if($row->sex == 1)
                          <td>Female</td>
                        @else($row->sex == 2)
                          <td>Male</td>
                        @endif

                         <td>{{ $row->cy}}</td>
                         <td>{{ $row->scholarship }}</td>

                       
                    
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
@endsection

@section('scripts')
<script>
  $(document).ready( function () {
    $('#datatable').DataTable();
});
</script>

@endsection