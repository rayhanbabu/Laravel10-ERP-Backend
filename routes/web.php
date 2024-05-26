<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MaintainController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UniverController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CollorController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PcategoryController;
use App\Http\Controllers\ScategoryController;
use App\Http\Controllers\SpendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ManagerpaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProjectController;  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('locale/{locale}',function($locale){
          Session::put('locale',$locale);
          return redirect()->back();
    });


     //Mainatin Panel
     Route::get('/maintain/login',[MaintainController::class,'login'])->middleware('MaintainTokenExist');
     Route::post('maintain/login-insert',[MaintainController::class,'login_insert']);
     Route::post('/maintain/login-verify',[MaintainController::class,'login_verify']);
     Route::get('maintain/forget',[MaintainController::class,'forget']); 
     Route::post('maintain/forget',[MaintainController::class,'forgetemail']); 
     Route::post('maintain/forgetcode',[MaintainController::class,'forgetcode']); 
     Route::post('maintain/confirmpass',[MaintainController::class,'confirmpass']);
   
   
     Route::middleware('MaintainToken')->group(function(){
          Route::get('/maintain/dashboard',[MaintainController::class,'dashboard']);
          Route::get('/maintain/logout',[MaintainController::class,'logout']);

          Route::get('maintain/password',[MaintainController::class,'passwordview']);
          Route::post('maintain/password',[MaintainController::class,'passwordupdate']);

           //Department  create
           Route::get('/maintain/dept_view',[DeptController::class,'dept_view']);
           Route::get('/maintain/dept_fetch',[DeptController::class,'fetch']);
           Route::get('/maintain/dept/fetch_data',[DeptController::class,'fetch_data']);
           Route::post('/maintain/dept_store',[DeptController::class,'store']);
           Route::get('/maintain/dept_edit',[DeptController::class,'dept_edit']);
           Route::post('/maintain/dept_update',[DeptController::class,'dept_update']);
           Route::delete('/maintain/dept_delete',[DeptController::class,'dept_delete']);
      
           Route::middleware('SupperAdminToken')->group(function(){
            //maintain people add
            Route::get('maintain/maintainview',[MaintainController::class,'maintainview']);
            Route::post('/maintain/store',[MaintainController::class,'store']);
            Route::get('/maintain/fetchAll',[MaintainController::class,'fetchAll']);
            Route::get('/maintain/edit',[MaintainController::class,'edit']);
            Route::post('/maintain/update',[MaintainController::class,'update']);


                 //Universty route
           Route::get('maintain/univer-view',[UniverController::class,'univer_view']);
           Route::post('/univer/store',[UniverController::class,'store']);
           Route::get('/univer/fetchAll',[UniverController::class,'fetchAll']);
           Route::get('/univer/edit',[UniverController::class,'edit']);
           Route::post('/univer/update',[UniverController::class,'update']);
           Route::delete('/univer/delete',[UniverController::class,'delete']);
           Route::post('/maintain/import',[UniverController::class,'import']);
           Route::post('/maintain/export',[UniverController::class,'export']);
           Route::post('/maintain/dompdf',[UniverController::class,'dompdf']);
           Route::post('/maintain/jsprint',[UniverController::class,'jsprint']);

           Route::post('/maintain/member_import',[MaintainController::class,'member_import']);
           Route::post('/maintain/member_export',[MaintainController::class,'member_export']);

           //Week  route
           Route::get('maintain/week-view',[WeekController::class,'week_view']);
           Route::post('/week/store',[WeekController::class,'store']);
           Route::get('/week/fetchAll',[WeekController::class,'fetchAll']);
           Route::get('/week/edit',[WeekController::class,'edit']);
           Route::post('/week/update',[WeekController::class,'update']);
           Route::delete('/week/delete',[WeekController::class,'delete']);

             });

         });


       //Teacher Panel
       Route::get('/admin/login',[TeacherController::class,'login'])->middleware('TeacherTokenExist');
       Route::post('admin/login-insert',[TeacherController::class,'login_insert']);
       Route::post('/admin/login-verify',[TeacherController::class,'login_verify']);
       Route::get('admin/forget',[TeacherController::class,'forget']); 
       Route::post('admin/forget',[TeacherController::class,'forgetemail']); 
       Route::post('admin/forgetcode',[TeacherController::class,'forgetcode']); 
       Route::post('admin/confirmpass',[TeacherController::class,'confirmpass']);
 
 
      Route::middleware('TeacherToken')->group(function(){
          Route::get('/admin/dashboard',[TeacherController::class,'dashboard']);
          Route::get('/admin/logout',[TeacherController::class,'logout']);
          Route::get('admin/password',[TeacherController::class,'passwordview']);
          Route::post('admin/password',[TeacherController::class,'passwordupdate']); 





                   
         Route::middleware('AdminToken')->group(function(){
              //Teacher  create
              Route::get('/admin/teacher_view',[TeacherController::class,'teacher_view']);
              Route::get('/admin/teacher_fetch',[TeacherController::class,'fetch']);
              Route::get('/admin/teacher/fetch_data',[TeacherController::class,'fetch_data']);
              Route::post('/admin/teacher_store',[TeacherController::class,'store']);
              Route::get('/admin/teacher_edit',[TeacherController::class,'teacher_edit']);
              Route::post('/admin/teacher_update',[TeacherController::class,'teacher_update']);
              Route::delete('/admin/teacher_delete',[TeacherController::class,'teacher_delete']);


             //collors  create
            Route::get('/admin/collor_view',[CollorController::class,'collor_view']);
            Route::get('/admin/collor_fetch',[CollorController::class,'fetch']);
            Route::get('/admin/collor/fetch_data',[CollorController::class,'fetch_data']);
            Route::post('/admin/collor_store',[CollorController::class,'store']);
            Route::get('/admin/collor_edit',[CollorController::class,'collor_edit']);
            Route::post('/admin/collor_update',[CollorController::class,'collor_update']);
            Route::delete('/admin/collor_delete',[CollorController::class,'collor_delete']);


           //project  create
         Route::get('/admin/project_view',[ProjectController::class,'project_view']);
         Route::get('/admin/project_fetch',[ProjectController::class,'fetch']);
         Route::get('/admin/project/fetch_data',[ProjectController::class,'fetch_data']);
         Route::post('/admin/project_store',[ProjectController::class,'store']);
         Route::get('/admin/project_edit',[ProjectController::class,'project_edit']);
         Route::post('/admin/project_update',[ProjectController::class,'project_update']);
         Route::delete('/admin/project_delete',[ProjectController::class,'project_delete']);
  
          //Site  create
         Route::get('/admin/site_view',[Sitecontroller::class,'site_view']);
         Route::get('/admin/site_fetch',[Sitecontroller::class,'fetch']);
         Route::get('/admin/site/fetch_data',[Sitecontroller::class,'fetch_data']);
         Route::post('/admin/site_store',[Sitecontroller::class,'store']);
         Route::get('/admin/site_edit',[Sitecontroller::class,'site_edit']);
         Route::post('/admin/site_update',[Sitecontroller::class,'site_update']);
         Route::delete('/admin/site_delete',[Sitecontroller::class,'site_delete']);
         
             //pcategory  create
            Route::get('/admin/pcategory_view',[Pcategorycontroller::class,'pcategory_view']);
            Route::get('/admin/pcategory_fetch',[Pcategorycontroller::class,'fetch']);
            Route::get('/admin/pcategory/fetch_data',[Pcategorycontroller::class,'fetch_data']);
            Route::post('/admin/pcategory_store',[Pcategorycontroller::class,'store']);
            Route::get('/admin/pcategory_edit',[Pcategorycontroller::class,'pcategory_edit']);
            Route::post('/admin/pcategory_update',[Pcategorycontroller::class,'pcategory_update']);
            Route::delete('/admin/pcategory_delete',[Pcategorycontroller::class,'pcategory_delete']); 

             //scategory  create
             Route::get('/admin/scategory_view',[Scategorycontroller::class,'scategory_view']);
             Route::get('/admin/scategory_fetch',[Scategorycontroller::class,'fetch']);
             Route::get('/admin/scategory/fetch_data',[Scategorycontroller::class,'fetch_data']);
             Route::post('/admin/scategory_store',[Scategorycontroller::class,'store']);
             Route::get('/admin/scategory_edit',[Scategorycontroller::class,'scategory_edit']);
             Route::post('/admin/scategory_update',[Scategorycontroller::class,'scategory_update']);
             Route::delete('/admin/scategory_delete',[Scategorycontroller::class,'scategory_delete']);

           
            //Members  create
             Route::get('/admin/member_view/{category}',[MemberController::class,'member_view']);
             Route::get('/admin/member_fetch/{category}',[MemberController::class,'fetch']);
             Route::get('/admin/member/fetch_data/{category}',[MemberController::class,'fetch_data']);
             Route::post('/admin/member_store',[MemberController::class,'store']);
             Route::get('/admin/member_edit',[MemberController::class,'member_edit']);
             Route::post('/admin/member_update',[MemberController::class,'member_update']);
             Route::delete('/admin/member_delete',[MemberController::class,'member_delete']);

         
         // Notice 
         Route::get('/admin/notice/{category}',[NoticeController::class,'index']);
         Route::get('/admin/notice_fetch/{category}',[NoticeController::class,'fetch']);
         Route::get('/admin/notice/fetch_data/{category}',[NoticeController::class,'fetch_data']); 
     
         Route::get('/admin/notice_create/{category}',[NoticeController::class,'notice_create']);
         Route::post('/admin/notice_insert',[NoticeController::class,'store']); 
         Route::get('/admin/notice_view/{id}/{category}',[NoticeController::class,'view']);
         Route::get('/admin/notice_edit/{id}/{category}',[NoticeController::class,'edit']);
         Route::post('/admin/notice_update/{id}',[NoticeController::class,'update']);
         Route::get('/admin/notice_delete/{id}/{category}',[NoticeController::class,'destroy']);


        // Reports Summary
        Route::get('/admin/report_summary',[PdfController::class,'report_summary']);
        Route::post('/pdf/spend_summary',[PdfController::class,'spend_summary']);
        Route::post('/pdf/manager_spend',[PdfController::class,'manager_spend']);
        Route::post('/pdf/manager_payment',[PdfController::class,'manager_payment']);
        Route::post('/pdf/site_payment',[PdfController::class,'site_payment']);

       });


        Route::middleware('PaymentView')->group(function(){
             //Payment View /Add
              Route::get('/admin/payment_view',[Paymentcontroller::class,'payment_view']);
              Route::get('/admin/payment_fetch',[Paymentcontroller::class,'fetch']);
              Route::get('/admin/payment/fetch_data',[Paymentcontroller::class,'fetch_data']);
              Route::post('/admin/payment_store',[Paymentcontroller::class,'store']);
        });

        Route::middleware('PaymentEdit')->group(function(){
           //payment  Edit /Delete
           Route::get('/admin/payment_edit',[Paymentcontroller::class,'payment_edit']);
           Route::post('/admin/payment_update',[Paymentcontroller::class,'payment_update']);
           Route::delete('/admin/payment_delete',[Paymentcontroller::class,'payment_delete']); 

     });


       Route::middleware('SpendView')->group(function(){
              //spend  View / create
              Route::get('/admin/spend_view',[Spendcontroller::class,'spend_view']);
              Route::get('/admin/spend_fetch',[Spendcontroller::class,'fetch']);
              Route::get('/admin/spend/fetch_data',[Spendcontroller::class,'fetch_data']);
              Route::post('/admin/spend_store',[Spendcontroller::class,'store']);

        });

       Route::middleware('SpendEdit')->group(function(){
          //spend edit / delete
          Route::get('/admin/spend_edit',[Spendcontroller::class,'spend_edit']);
          Route::post('/admin/spend_update',[Spendcontroller::class,'spend_update']);
          Route::delete('/admin/spend_delete',[Spendcontroller::class,'spend_delete']); 
       });


        Route::middleware('PmanagerView')->group(function(){
              // Manager payment View / create
              Route::get('/admin/managerpayment_view',[Managerpaymentcontroller::class,'managerpayment_view']);
              Route::get('/admin/managerpayment_fetch',[Managerpaymentcontroller::class,'fetch']);
              Route::get('/admin/managerpayment/fetch_data',[Managerpaymentcontroller::class,'fetch_data']);
              Route::post('/admin/managerpayment_store',[Managerpaymentcontroller::class,'store']);
          });

         Route::middleware('PmanagerEdit')->group(function(){
              // Manager payment edit / delete
              Route::get('/admin/managerpayment_edit',[Managerpaymentcontroller::class,'managerpayment_edit']);
              Route::post('/admin/managerpayment_update',[Managerpaymentcontroller::class,'managerpayment_update']);
              Route::delete('/admin/managerpayment_delete',[Managerpaymentcontroller::class,'managerpayment_delete']); 
         });


             // Report  create
             Route::get('/admin/report_view',[ReportController::class,'report_view']);
             Route::get('/admin/report_fetch',[ReportController::class,'fetch']);
             Route::get('/admin/report/fetch_data',[ReportController::class,'fetch_data']);
             Route::post('/admin/report_store',[ReportController::class,'store']);
             Route::get('/admin/report_edit',[ReportController::class,'report_edit']);
             Route::post('/admin/report_update',[ReportController::class,'report_update']);
             Route::delete('/admin/report_delete',[ReportController::class,'report_delete']);





          // Reports pdf
          Route::get('/pdf/semester_routine', [PdfController::class,'semester_routine_pdf']);



      });

     








     Route::get('/', function (){
            return view('welcome');
      });

     Route::get('/send-mail', function () {
          $details = [
              'title' => 'Sample Title From Mail',
              'body' => 'This is sample content we have added for this test mail'
          ];
        Mail::to('rayhanbabu458@gmail.com')->send(new \App\Mail\SendMail($details));
        dd("Email is Sent, please check your inbox.");
   });
