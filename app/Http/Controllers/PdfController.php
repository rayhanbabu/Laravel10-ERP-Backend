<?php
namespace App\Http\Controllers; 
use Exception;
use App\Models\Teacher;
use App\Models\Payment;
use App\Models\Site;
use App\Models\Spend;
use App\Models\Managerpayment;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{

  public function report_summary(Request $request){
      try{  
           $dept_id = $request->header('dept_id');
           $site=Site::where('site_status',1)->where('dept_id',$dept_id)->orderBy('id','desc')->get();
           $manager=Teacher::where('teacher_status',1)->where('dept_id',$dept_id)->orderBy('id','desc')->get();
           return view('admin.report_summary',['site'=>$site,'manager'=>$manager]);

          }catch (Exception $e) { return  view('errors.error',['error'=>$e]);}
       }

     public function spend_summary(Request $request){
        // try{  
            $dept_id = $request->header('dept_id');
            $date=$request->date;
            $site_id=$request->site_id;
        if($date){
          $data=Spend::leftjoin('sites','sites.id', '=','spends.site_id')
          ->leftjoin('scategories','scategories.id', '=','spends.scategory_id')
          ->leftjoin('teachers','teachers.id', '=','spends.created_by')
          ->where('spends.dept_id',$dept_id)->where('spends.site_id',$site_id)
          ->where('spends.date',$date)->select('sites.site_name','scategories.scategory_name'
          ,'teachers.teacher_name','spends.*')
          ->orderBy('id','asc')->get();
        }else{
          $data=Spend::leftjoin('sites','sites.id', '=','spends.site_id')
          ->leftjoin('scategories','scategories.id', '=','spends.scategory_id')
          ->leftjoin('teachers','teachers.id', '=','spends.created_by')
          ->where('spends.dept_id',$dept_id)->where('spends.site_id',$site_id)->select('sites.site_name','scategories.scategory_name'
          ,'teachers.teacher_name','spends.*')
          ->orderBy('id','asc')->get();
        }
           
        $file='site-summary'; 
       
        $pdf=PDF::setPaper('a4','portrait')->loadView('pdf.spend',['data'=>$data,'dept_id'=>$dept_id]);
             //return $pdf->download($file); portrait landscape 
         return  $pdf->stream($file,array('Attachment'=>false)); 
      //}catch (Exception $e) { return  view('errors.error',['error'=>$e]);}
   }


     
   public function manager_spend(Request $request){
    // try{  
        $dept_id = $request->header('dept_id');
        $date=$request->date;
        $manager_id=$request->manager_id;

    if($date){
       $data=Spend::leftjoin('sites','sites.id', '=','spends.site_id')
        ->leftjoin('scategories','scategories.id', '=','spends.scategory_id')
        ->leftjoin('teachers','teachers.id', '=','spends.created_by')
        ->where('spends.dept_id',$dept_id)->where('spends.created_by',$manager_id)
        ->where('spends.date',$date)->select('sites.site_name','scategories.scategory_name'
        ,'teachers.teacher_name','spends.*')
         ->orderBy('id','asc')->get();
    }else{
       $data=Spend::leftjoin('sites','sites.id', '=','spends.site_id')
         ->leftjoin('scategories','scategories.id', '=','spends.scategory_id')
         ->leftjoin('teachers','teachers.id', '=','spends.created_by')
         ->where('spends.dept_id',$dept_id)->where('spends.created_by',$manager_id)->select('sites.site_name','scategories.scategory_name'
         ,'teachers.teacher_name','spends.*')
         ->orderBy('id','asc')->get();
     }
       
       $file='Manager-summary'; 
       $pdf=PDF::setPaper('a4','portrait')->loadView('pdf.manager_spend',['data'=>$data,'dept_id'=>$dept_id]);
         //return $pdf->download($file); portrait landscape 
     return  $pdf->stream($file,array('Attachment'=>false)); 
  //}catch (Exception $e) { return  view('errors.error',['error'=>$e]);}
}

    

public function manager_payment(Request $request){
  // try{  
      $dept_id = $request->header('dept_id');
      $date=$request->date;
      $manager_id=$request->manager_id;

  if($date){
         $data=Managerpayment::leftjoin('sites','sites.id', '=','managerpayments.site_id')
         ->leftjoin('pcategories','pcategories.id', '=','managerpayments.pcategory_id')
         ->leftjoin('teachers','teachers.id', '=','managerpayments.manager_id')
         ->where('managerpayments.dept_id',$dept_id)->where('managerpayments.manager_id',$manager_id)
         ->where('managerpayments.date',$date)->select('sites.site_name','pcategories.pcategory_name'
          ,'teachers.teacher_name','managerpayments.*')
          ->orderBy('id','asc')->get();
  }else{
       $data=Managerpayment::leftjoin('sites','sites.id', '=','managerpayments.site_id')
         ->leftjoin('pcategories','pcategories.id', '=','managerpayments.pcategory_id')
         ->leftjoin('teachers','teachers.id', '=','managerpayments.manager_id')
         ->where('managerpayments.dept_id',$dept_id)->where('managerpayments.manager_id',$manager_id)->select('sites.site_name','pcategories.pcategory_name'
         ,'teachers.teacher_name','managerpayments.*')
         ->orderBy('id','asc')->get();
    }
     
      $file='Manager-summary'; 
      $pdf=PDF::setPaper('a4','portrait')->loadView('pdf.manager_payment',['data'=>$data,'dept_id'=>$dept_id]);
       //return $pdf->download($file); portrait landscape 
     return  $pdf->stream($file,array('Attachment'=>false)); 
      //}catch (Exception $e) { return  view('errors.error',['error'=>$e]);}
  }



    public function site_payment(Request $request){
      // try{  
        $dept_id = $request->header('dept_id');
        $date=$request->date;
        $site_id=$request->site_id;

      if($date){
           $data=Payment::leftjoin('sites','sites.id', '=','payments.site_id')
             ->leftjoin('pcategories','pcategories.id', '=','payments.pcategory_id')
             ->leftjoin('teachers','teachers.id', '=','payments.created_by')
             ->where('payments.dept_id',$dept_id)->where('payments.site_id',$site_id)
             ->where('payments.date',$date)->select('sites.site_name','pcategories.pcategory_name'
             ,'teachers.teacher_name','payments.*')
              ->orderBy('id','asc')->get();
      }else{
          $data=Payment::leftjoin('sites','sites.id', '=','payments.site_id')
            ->leftjoin('pcategories','pcategories.id', '=','payments.pcategory_id')
            ->leftjoin('teachers','teachers.id', '=','payments.created_by')
             ->where('payments.dept_id',$dept_id)->where('payments.site_id',$site_id)->select('sites.site_name','pcategories.pcategory_name'
             ,'teachers.teacher_name','payments.*')
             ->orderBy('id','asc')->get();
        }
       
         $file='Payment-summary'; 
         $pdf=PDF::setPaper('a4','portrait')->loadView('pdf.site_payment',['data'=>$data,'dept_id'=>$dept_id]);
          //return $pdf->download($file); portrait landscape 
         return  $pdf->stream($file,array('Attachment'=>false)); 
        //}catch (Exception $e) { return  view('errors.error',['error'=>$e]);}
     }
  
  




}
