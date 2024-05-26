@extends('admin.layout')
@section('page_title','Admin Panel')
@section('spend','active')
@section('content')

<div class="card mt-3 mb-0"> 
   <div class="card-header ">
      <div class="row">
                 <div class="col-sm-3 my-2"> <h5 class="mt-0">Spend Info </h5></div>
                  <div class="col-sm-3 my-2">
                     <div class="d-grid gap-2 d-flex justify-content-end"> 
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add</button>  
                     </div>    
                  </div>

                <div class="col-sm-6 my-2 ">
                    <div class="d-grid gap-3 d-flex justify-content-end">
                   
                    </div>
                </div>

                @if(Session::has('success'))
                  <div  class="alert alert-success"> {{Session::get('success')}}</div>
                   @endif
 
                     @if(Session::has('fail'))
                 <div  class="alert alert-danger"> {{Session::get('fail')}}</div>
                  @endif
    </div>             

    </div>
      
  <div class="card-body">

    <div class="row">
        <div class="col-md-3">
              <select class="form-select form-select-sm" id="range" name="range" aria-label="Default select example " required>
                    <option  value="10">10 </option>
                    <option  value="20">20 </option>
                    <option  value="50">50 </option>
                    <option  value="100">100 </option>
              </select>             
        </div> 
       <div class="col-md-6"> </div>       
            
    <div class="col-md-3 p-2">
     <div class="form-group">
         <input type="text" name="search" id="search" placeholder="Enter Search " class="form-control form-control-sm"  autocomplete="off"  />
     </div>
    </div>
   </div>
   <div id="success_message"></div>


				
<div class="table-responsive">		
<div class="x_content">
 <table id="employee_data"  class="table table-bordered table-hover table-sm shadow">
    <thead>
       <tr>
           <th  width="10%"> Image</th>
           <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="date" style="cursor: pointer"> Date 
                <span id="date_icon" ><i class="fas fa-sort-amount-up-alt"></i></span> </th>
           <th  width="10%"> Manager </th>
           <th  width="10%"> Site </th>
           <th  width="10%"> Spend Category </th>
           <th  width="10%">Amount </th>
           <th  width="10%">Reff </th>
          @if(spend_edit())
		       <th  width="10%"> </th>
           <th  width="10%"> </th>
          @endif
           <th  width="10%">Created at </th>
           <th  width="10%">Updated at </th>
         
       
      </tr>

       <tr>
          <td colspan="5">
            <div  class="loader_page text-center">
                <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
            </div>
         </td>
      </tr>
         
    </thead>
    <tbody>
       
    </tbody>
  </table>
       
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
 
 
</div>
</div>
</div>



{{-- add new Student modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="add_employee_form" enctype="multipart/form-data">

        <div class="modal-body p-4 bg-light">
          <div class="row">


          <div class="col-lg-12 my-1">
               <label for="roll">Date<span style="color:red;"> * </span></label>
               <input type="date" name="date" id="date" class="form-control" placeholder="" required>
               <p class="text-danger error_date"></p>
            </div>

           <div class="col-lg-12 my-2">
                 <label for="roll">Site Name<span style="color:red;"> * </span></label>
              <select class="form-select" id="site_id" name="site_id" aria-label="Default select example " required>
                       <option  value="">Select One </option>
                       @foreach($site as $row)
                            <option   value="{{$row->id}}">{{$row->site_name}}</option>
                        @endforeach  
               </select>
           </div>


           <div class="col-lg-12 my-2">
                 <label for="roll">Spend Category<span style="color:red;"> * </span></label>
              <select class="form-select" id="scategory_id" name="scategory_id" aria-label="Default select example " required>
                       <option  value="">Select One </option>
                       @foreach($scategory as $row)
                            <option   value="{{$row->id}}">{{$row->scategory_name}}</option>
                        @endforeach  
               </select>
           </div>


            <div class="col-lg-12 my-1">
               <label for="roll">Amount<span style="color:red;"> * </span></label>
               <input type="number" name="amount" id="amount" class="form-control" placeholder="" required>
               <p class="text-danger error_amount"></p>
            </div>

            <div class="col-lg-12 my-1">
               <label for="roll">Reff</label>
               <input type="text" name="reff" id="reff" class="form-control" placeholder="" >
               <p class="text-danger error_amount"></p>
            </div>

          
            <div class="col-lg-12 my-2">
                <label for="roll"> Image (Max:400KB)</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="" >
                <p class="text-danger error_building_image"></p>
            </div>

          
        

            <ul class="alert alert-warning d-none" id="add_errorlist"></ul>

            
          </div>    
          <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>

        <div class="mt-4">
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit </button>
       </div>  

      </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
        </div>
      </form>
    </div>
  </div>
</div>

{{-- add new employee modal end --}}



{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="edit_employee_form" enctype="multipart/form-data">
     
         <div class="modal-body p-4 bg-light">
          <div class="row">
          <input type="hidden" name="edit_id" id="edit_id">


          <div class="col-lg-12 my-1">
               <label for="roll">Date<span style="color:red;"> * </span></label>
               <input type="date" name="date" id="edit_date" class="form-control" placeholder="" required>
               <p class="text-danger error_date"></p>
            </div>

          <div class="col-lg-12 my-2">
                 <label for="roll">Site Name<span style="color:red;"> * </span></label>
              <select class="form-select" id="edit_site_id" name="site_id" aria-label="Default select example " required>
                       <option  value="">Select One </option>
                       @foreach($site as $row)
                            <option   value="{{$row->id}}">{{$row->site_name}}</option>
                        @endforeach  
               </select>
           </div>


           <div class="col-lg-12 my-2">
                 <label for="roll">Spend Category<span style="color:red;"> * </span></label>
              <select class="form-select" id="edit_scategory_id" name="scategory_id" aria-label="Default select example " required>
                       <option  value="">Select One </option>
                       @foreach($scategory as $row)
                            <option   value="{{$row->id}}">{{$row->scategory_name}}</option>
                        @endforeach  
               </select>
           </div>


            <div class="col-lg-12 my-1">
               <label for="roll">Amount<span style="color:red;"> * </span></label>
               <input type="number" name="amount" id="edit_amount" class="form-control" placeholder="" required>
               <p class="text-danger error_amount"></p>
            </div>

            <div class="col-lg-12 my-1">
               <label for="roll">Reff</label>
               <input type="text" name="reff" id="edit_reff" class="form-control" placeholder="" >
               <p class="text-danger error_amount"></p>
            </div>


            <div class="col-lg-12 my-2">
                <label for="roll"> Image (Max:300*300px)</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="" >
                <p class="text-danger error_building_image"></p>
            </div>

 
           

            <ul class="alert alert-warning d-none" id="edit_form_errlist"></ul>
         

         </div>

      <div class="mt-2" id="avatar"> </div>

             

         
          <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>

        <div class="mt-4">
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update </button>
       </div>  

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}



<script>  
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    
         fetchAll();
         function fetchAll(){
            $.ajax({
             type:'GET',
             url:'/admin/spend_fetch',
             datType:'json',
             beforeSend : function()
               {
               $('.loader_page').show();
               },
              success:function(response){
                    $('tbody').html('');
                    $('.x_content tbody').html(response);
                    $('.loader_page').hide();
                }
            });
         }
 
       // add new employee ajax request
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
          type:'POST',
          url:'/admin/spend_store',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               $("#add_employee_btn").prop('disabled', true);
               },
          success: function(response){
            $('.loader').hide();
            $("#add_employee_btn").prop('disabled', false);
            if(response.status==200){
               $("#add_employee_form")[0].reset();
               $("#addEmployeeModal").modal('hide');
               $('#success_message').html("");
               $('#success_message').addClass('alert alert-success');
               $('#success_message').text(response.message);
               $('.error_hall').text('');
               $('#add_errorlist').html("");
               $('#add_errorlist').addClass("d-none");
              
               fetchAll();
              }else if(response.status == 400){
                Swal.fire("Warning",response.message,"warning");
              }else if(response.status == 300){
                Swal.fire("Warning",response.message,"warning");
              }else if(response.status == 700){
                    $('#add_errorlist').html("");
                    $('#add_errorlist').removeClass('d-none');
                    $.each(response.message,function(key,err_values){ 
                    $('#add_errorlist').append('<li>'+err_values+'</li>');
                    });     
              }
            
            
          }
        });
     });



        // edit employee ajax request
        $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
         //let id = $(this).attr('id');
         var id = $(this).val(); 
        $.ajax({
          type:'GET',
          url:'/admin/spend_edit',
          data: {
            id: id,
          },
          success: function(response){
              //console.log(response);
              $("#edit_site_id").val(response.data.site_id);
              $("#edit_scategory_id").val(response.data.scategory_id);
              $("#edit_date").val(response.data.date);
              $("#edit_amount").val(response.data.amount);
              $("#edit_reff").val(response.data.reff);
              $("#edit_id").val(response.data.id);
          }
        });
      });




       // update employee ajax request
       $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
      
        const fd = new FormData(this);

        $.ajax({
          type:'POST',
          url:'/admin/spend_update',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               },
          success: function(response){
            if (response.status == 200){
               $('#success_message').html("");
               $('#success_message').addClass('alert alert-success');
               $('#success_message').text(response.message);
               $("#edit_employee_form")[0].reset();
               $("#editEmployeeModal").modal('hide');
               $('#edit_form_errlist').html("");
               $('#edit_form_errlist').addClass('d-none');
               fetchAll();
             }else if(response.status == 400){
                 Swal.fire("Warning",response.message, "warning");
             }else if(response.status == 300){
                 Swal.fire("Warning",response.message, "warning");
             }else if(response.status == 700){
                     $('#edit_form_errlist').html("");
                     $('#edit_form_errlist').removeClass('d-none');
                        $.each(response.message, function(key, err_values) {
                        $('#edit_form_errlist').append('<li>' + err_values + '</li>');
                     });
              }
            $('.loader').hide();
          }
         
        });
      
      });


        
        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        var id = $(this).val(); 
        console.log(id);
        Swal.fire({
          title: 'Are you sure?',
          text: "You want to delete this item!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url:'/admin/spend_delete',
              method:'delete',
              data: {
                id: id,
              },
              success: function(response) {
                //console.log(response);
                 if(response.status == 200){
                    Swal.fire("Warning",response.message, "warning");
                 }else if(response.status == 300)
                    Swal.fire("Deleted",response.message, "success");
                   fetchAll();
              }
            });
          }
        })
      });






   function fetch_data(page, sort_type="", sort_by="", search="",range=""){
    $.ajax({
      url:"/admin/spend/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&search="+search+"&range="+range,
     beforeSend : function()
               {
               $('.loader_page').show();
               },
    success:function(data)
    {
      $('.loader_page').hide();
    $('tbody').html('');
    $('.x_content tbody').html(data);
  
    }
    });
     }


       
$(document).on('keyup', '#search', function(){
    var search = $('#search').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    var page = $('#hidden_page').val();
    var range = $('#range').val();
    fetch_data(page, sort_type, column_name, search,range);
  });


  $(document).on('click', '.pagin_link a', function(event){
       event.preventDefault();
       var page = $(this).attr('href').split('page=')[1];
       var column_name = $('#hidden_column_name').val();
       var sort_type = $('#hidden_sort_type').val();
       var search = $('#search').val();
       var range = $('#range').val();
      fetch_data(page, sort_type, column_name, search,range);
    }); 


    $(document).on('click', '.sorting', function(){
          var column_name = $(this).data('column_name');
          var order_type = $(this).data('sorting_type');
          var reverse_order = '';
            if(order_type == 'asc')
             {
            $(this).data('sorting_type', 'desc');
            reverse_order = 'desc';
            $('#'+column_name+'_icon').html('<i class="fas fa-sort-amount-down"></i>');
             }
            else
            {
            $(this).data('sorting_type', 'asc');
            reverse_order = 'asc';
            $('#'+column_name+'_icon').html('<i class="fas fa-sort-amount-up-alt"></i>');
            }
           $('#hidden_column_name').val(column_name);
           $('#hidden_sort_type').val(reverse_order);
           var page = $('#hidden_page').val();
           var search = $('#search').val();
           var range = $('#range').val();
           fetch_data(page, reverse_order, column_name, search, range);
          });




   

  $(document).on('change', '#range', function(){
    var search = $('#search').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    var page = $('#hidden_page').val();
    var range = $('#range').val();
    fetch_data(page, sort_type, column_name, search,range);
  });


	




});

</script>





 


 







@endsection 