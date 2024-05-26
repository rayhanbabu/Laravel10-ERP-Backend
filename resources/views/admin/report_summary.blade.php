@extends('admin.layout')
@section('page_title','Admin Panel')
@section('report_summary','active')
@section('content')

<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Report Summary </h4>
      </div>
    </div>

<div class="row my-3">


    <div class="col-xl-4 col-md-6 p-2">
        <div class="card bg-light shadow">
             <div class="mx-3 my-2">
                 <b class="text-center"> Spend Report by Site  </b>
            </div>
            <form action="{{ url('pdf/spend_summary') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
             <div class="row  p-3 ">
                  <div class="d-grid gap-3 d-flex justify-content-end p-2 ">
                      <input type="date" name="date" class="form-control form-control-sm" value="" >
                 </div>

                  <div class="d-grid gap-3 d-flex justify-content-end p-2">
                       <select class="form-control form-control-sm" name="site_id" id="site_id" aria-label="Default select example" required >
                            <option value=""> Select Site </option>
                              @foreach($site as $row)
                                 <option value="{{$row->id}}">{{$row->site_name}}</option>
                              @endforeach  
                       </select>
                  </div>

            </div>

                <div class="form-group  mx-3 my-3">
                       <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light btn-sm">
                </div>

            </form>
        </div>
    </div>




    <div class="col-xl-4 col-md-6 p-2">
        <div class="card bg-light shadow">
             <div class="mx-3 my-2">
                 <b class="text-center"> Spend Report by Manager  </b>
            </div>
            <form action="{{ url('pdf/manager_spend') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
             <div class="row  p-3 ">
                  <div class="d-grid gap-3 d-flex justify-content-end p-2 ">
                      <input type="date" name="date" class="form-control form-control-sm" value="" >
                 </div>

                  <div class="d-grid gap-3 d-flex justify-content-end p-2">
                       <select class="form-control form-control-sm" name="manager_id"  aria-label="Default select example" required >
                            <option value=""> Select Manager </option>
                              @foreach($manager as $row)
                                 <option value="{{$row->id}}">{{$row->teacher_name}}</option>
                              @endforeach  
                       </select>
                  </div>

            </div>

                <div class="form-group  mx-3 my-3">
                       <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light btn-sm">
                </div>

            </form>
        </div>
    </div>



    <div class="col-xl-4 col-md-6 p-2">
        <div class="card bg-light shadow">
             <div class="mx-3 my-2">
                 <b class="text-center"> Manager Payment </b>
            </div>
            <form action="{{ url('pdf/manager_payment') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
             <div class="row  p-3 ">
                  <div class="d-grid gap-3 d-flex justify-content-end p-2 ">
                      <input type="date" name="date" class="form-control form-control-sm" value="" >
                 </div>

                  <div class="d-grid gap-3 d-flex justify-content-end p-2">
                       <select class="form-control form-control-sm" name="manager_id"  aria-label="Default select example" required >
                            <option value=""> Select Manager </option>
                              @foreach($manager as $row)
                                 <option value="{{$row->id}}">{{$row->teacher_name}}</option>
                              @endforeach  
                       </select>
                  </div>

            </div>

                <div class="form-group  mx-3 my-3">
                       <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light btn-sm">
                </div>

            </form>
        </div>
    </div>



    <div class="col-xl-4 col-md-6 p-2">
        <div class="card bg-light shadow">
             <div class="mx-3 my-2">
                 <b class="text-center">Payment Report by Site</b>
            </div>
            <form action="{{ url('pdf/site_payment') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
             <div class="row  p-3 ">
                  <div class="d-grid gap-3 d-flex justify-content-end p-2 ">
                      <input type="date" name="date" class="form-control form-control-sm" value="" >
                 </div>

                  <div class="d-grid gap-3 d-flex justify-content-end p-2">
                       <select class="form-control form-control-sm" name="site_id"  aria-label="Default select example" required >
                            <option value=""> Select Manager </option>
                              @foreach($site as $row)
                                 <option value="{{$row->id}}">{{$row->site_name}}</option>
                              @endforeach  
                       </select>
                  </div>

            </div>

                <div class="form-group  mx-3 my-3">
                       <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light btn-sm">
                </div>

            </form>
        </div>
    </div>






 </div>





 


 







@endsection 