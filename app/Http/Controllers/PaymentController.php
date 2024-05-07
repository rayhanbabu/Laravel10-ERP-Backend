<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\Site;
use App\Models\Pcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\validator;

class PaymentController extends Controller
{
   
    public function payment_view(Request $request){
         try{  
            $dept_id = $request->header('dept_id');
            $teacher_id = $request->header('id');
            $pcategory=Pcategory::where('dept_id',$dept_id)->where('pcategory_status',1)->orderby('id','asc')->get();
            $site=Site::where('dept_id',$dept_id)->where('site_status',1)->orderby('id','asc')->get();
            $member=Teacher::where('dept_id',$dept_id)->where('teacher_status',1)->orderby('id','asc')->get();
            return view('admin.payment',['pcategory'=>$pcategory,'site'=>$site,'member'=>$member]);
           }catch (Exception $e) { return  view('errors.error',['error'=>$e]);}
      }
 
      public function store(Request $request){

        $dept_id = $request->header('dept_id');
        $teacher_id = $request->header('id');
        $validator=\Validator::make($request->all(),[    
            'site_id'=>'required',
            'pcategory_id'=>'required',
            'amount'=>'required',
            'date'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg|max:400',
           ],
         );
 
      if($validator->fails()){
             return response()->json([
               'status'=>700,
               'message'=>$validator->messages(),
            ]);
      }else{
        $date=$request->input('date');
        $day = date('d', strtotime($date)); 
        $month = date('m', strtotime($date)); 
        $year = date('Y', strtotime($date));
             $model= new Payment;
             $model->dept_id=$dept_id;
             $model->amount=$request->input('amount');
             $model->date=$date;
             $model->pcategory_id=$request->input('pcategory_id');
             $model->site_id=$request->input('site_id');
             $model->reff=$request->input('reff');
             $model->day=$day;
             $model->month=$month;
             $model->year=$year;
             $model->received_by=$request->input('received_by');
             $model->created_by=$teacher_id;
             if ($request->hasfile('image')) {
               $imgfile = 'booking-';
               $size = $request->file('image')->getsize();
               $file = $_FILES['image']['tmp_name'];
               $hw = getimagesize($file);
               $w = $hw[0];
               $h = $hw[1];
               if ($w < 310 && $h < 310) {
                   $image = $request->file('image');
                   $new_name = $imgfile . rand() . '.' . $image->getClientOriginalExtension();
                   $image->move(public_path('uploads'), $new_name);
                   $model->image = $new_name;
                } else {
                   return response()->json([
                       'status' => 300,
                       'message' => 'Image size must be 300*300px',
                   ]);
                 }
             }
            
             $model->save();
 
             return response()->json([
                   'status'=>200,  
                   'message'=>'Data Added Successfull',
              ]);     
         }
     }
 
    public function payment_edit(Request $request) {
      $id = $request->id;
      $data = Payment::find($id);
      return response()->json([
          'status'=>200,  
          'data'=>$data,
       ]);
    }
 
 
    public function payment_update(Request $request ){

        $validator=\Validator::make($request->all(),[    
            'site_id'=>'required',
            'pcategory_id'=>'required',
            'amount'=>'required',
            'date'=>'required',
           'image'=>'image|mimes:jpeg,png,jpg|max:400',
       ]);
 
      $teacher_id = $request->header('id');
    if($validator->fails()){
          return response()->json([
            'status'=>700,
            'message'=>$validator->messages(),
         ]);
    }else{
        $date=$request->input('date');
        $day = date('d', strtotime($date)); 
        $month = date('m', strtotime($date)); 
        $year = date('Y', strtotime($date));
         $model=Payment::find($request->input('edit_id'));
      if($model){
        $model->amount=$request->input('amount');
        $model->date=$date;
        $model->pcategory_id=$request->input('pcategory_id');
        $model->site_id=$request->input('site_id');
        $model->reff=$request->input('reff');
        $model->received_by=$request->input('received_by');
        $model->updated_by=$teacher_id;
        $model->day=$day;
        $model->month=$month;
        $model->year=$year;
         if ($request->hasfile('image')) {
            $imgfile = 'booking-';
            $size = $request->file('image')->getsize();
            $file = $_FILES['image']['tmp_name'];
            $hw = getimagesize($file);
            $w = $hw[0];
            $h = $hw[1];
            if ($w < 310 && $h < 310) {
              $path = public_path('uploads') . '/' . $model->image;
               if(File::exists($path)){
                   File::delete($path);
                 }
                $image = $request->file('image');
                $new_name = $imgfile . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $new_name);
                $model->image = $new_name;
            } else {
               return response()->json([
                   'status' =>300,
                   'message' =>'Image size must be 300*300px',
               ]);
             }
         }
        
          $model->update();   
           return response()->json([ 
              'status'=>200,
              'message'=>'Data Updated Successfull'
           ]);
       }else{
         return response()->json([
             'status'=>404,  
             'message'=>'Student not found',
           ]);
     }
 
     }
   }
 
 
   public function payment_delete(Request $request) { 
 
       // $hallinfo=Building::where('id',$request->input('id'))->count('id');
       //  if($hallinfo>0){
       //     return response()->json([
       //       'status'=>200,  
       //       'message'=>'Can not delete this record. This hall is used in hall info table.',
       //      ]);
       //   }else{
           $model=Payment::find($request->input('id'));
           $filePath = public_path('uploads') . '/' . $model->image;
           if(File::exists($filePath)){
                 File::delete($filePath);
            }
           $model->delete();
           return response()->json([
              'status'=>300,  
              'message'=>'Data Deleted Successfully',
         ]);
         
     // }
    } 
   
 
 
   public function fetch(Request $request){
       $dept_id = $request->header('dept_id');
       $data=Payment::leftjoin('sites','sites.id', '=','payments.site_id')
       ->leftjoin('pcategories','pcategories.id', '=','payments.pcategory_id')
       ->leftjoin('teachers','teachers.id', '=','payments.created_by')
       ->where('payments.dept_id',$dept_id)->select('sites.site_name','pcategories.pcategory_name'
       ,'teachers.teacher_name','payments.*')
       ->orderBy('id','desc')->paginate(10);
       return view('admin.payment_data',compact('data'));
    }
 
 
 
   function fetch_data(Request $request)
   {
    if($request->ajax())
    {
          $dept_id = $request->header('dept_id');
          $sort_by = $request->get('sortby');
          $sort_type = $request->get('sorttype'); 
          $search = $request->get('search');
          $search = str_replace("","%", $search);
          $data =Payment::leftjoin('sites','sites.id', '=','payments.site_id')
              ->leftjoin('pcategories','pcategories.id', '=','payments.pcategory_id')
              ->leftjoin('teachers','teachers.id', '=','payments.created_by')
              ->where('payments.dept_id',$dept_id)
              ->where(function($query) use ($search) {
                  $query->where('date', 'like', '%'.$search.'%')
                     ->orWhere('amount', 'like', '%'.$search.'%');
               })->select('sites.site_name','pcategories.pcategory_name'
               ,'teachers.teacher_name','payments.*')->paginate(10);
                   return view('admin.payment_data', compact('data'))->render();
                  
       }
   }




}
