<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Student;
use App\Month;
use App\Payment;
use App\Reminder;
use App\Closing;
use DB;


class PaymentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function index()
    {
      // $students = Student::all();
      // return view('payment.index')->withStudents($students);
    }

   

    public function liveSearch(Request $request){
     
        $output ="";
        if($request->ajax()){
        $students = DB::table('students')->where('fname','LIKE','%'.$request->search.'%')->orWhere('mname','LIKE','%'.$request->search.'%')->orWhere('lname','LIKE','%'.$request->search.'%')->orWhere('class','LIKE','%'.$request->search.'%')->orWhere('section','LIKE','%'.$request->search.'%')->orWhere('kebele','LIKE','%'.$request->search.'%')->get();
        if($students){
           foreach ($students as $key => $student) {
             $output .='<tr>'.
                        '<td>'.$student->id.'</td>'.  
                        '<td>'.$student->fname.'</td>'.
                        '<td>'.$student->mname.'</td>'.
                        '<td>'.$student->lname.'</td>'.
                        '<td>'.$student->gender.'</td>'.
                        '<td>'.$student->class.'</td>'.
                        '<td>'. $student->section.'</td>'.
                        '<td>'.$student->age.'</td>'.
                        '<td>'.$student->kebele.'</td>'.
                        '<td><a class="btn btn-sm btn-primary" href="'.url('/student/'.$student->id).'">More</a></td>'.
                        '<td><a class="btn btn-sm btn-warning" href="'.url('/payment/'.$student->id).'">Payment Detail</a></td>'.
                        '<td><a class="btn btn-sm w3-teal" href="'.route('student.edit', $student->id).'">Edit</a></td>'.
                        '<td><a class="btn btn-sm btn-danger" href="'.route('student.destroy', $student->id).'">Delete</a></td>'.
                      '</tr>';

           }

           return Response($output);      
         }
       }else{
         Response('');
       }
    }


    public function showDetails($id){
       $student = Student::findOrFail($id); 
       $payment = DB::table('payments')->where('student_id',$student->id)->first();
       $last_paid = DB::table('reminders')->select('reminder')->where('student_id',$student->id)->get()->first();
       $month = DB::table('months')->select('month')->where('id',$last_paid->reminder)->get()->first();
  
       return view('payment.show')->withStudent($student)->withPayment($payment)->withMonth($month);
    }


    public function recievePayment(Request $request, $id){
      $student = Student::findOrFail($id);
      if($student->bus){
         $validation = Validator::make($request->all(),[
           'regular' => 'required|numeric',
           'busp' => 'required|numeric',
         ]);
         if($validation->fails()){
           return back()->withErrors($validation);
         }
      }else{
          $validation = Validator::make($request->all(),[
           'regular' => 'required|numeric',
         ]);
         if($validation->fails()){
           return back()->withErrors($validation);
         }
 
      }

      $payment = Payment::where('student_id',$id)->first();
      if($payment){
        $total = $request->regular;
        if($request->has('busp')){
           $total += $request->busp;
        }
        $sumtotal = ($payment->total) + ($total);
        $payment->update([
          $request->month =>  $total,
          'total' => $sumtotal,  
        ]);
      }else{
        return back()->withErrors('Student Does not exist');
      }
      
      // Updating reminder months

      $month = Month::where('month',$request->month)->get()->first(); 
      $rmonth = $month->id;
      if($rmonth == 12){
        $rmonth = 1;
      }else{
        $rmonth += 1;
      }

      $reminder = Reminder::where('student_id',$id);
      $reminder->update([
        'reminder' => $rmonth,   
      ]); 

      return back()->withSuccess('Paid Successfully!');
    }


    public function notPaid($month){
      $ids = DB::table('payments')->where($month, 0.00)->pluck('student_id');
      $students;
      if($ids->toArray() == null){
        return back()->withErrors('All students have paid thier fee on ->'.$month);
      }else{
        $students = Student::findOrFail($ids->toArray());
        return view('payment.npaid')->withStudents($students)->withMonth($month);
      }

    }



    public function closePayment(){
       $payments = Payment::all();
       $total = 0;

       foreach ($payments as $payment) {
         $total += $payment->total;
         $payment->update([
           'september' => '0.00',
           'october' => '0.00', 
           'november' => '0.00', 
           'december' => '0.00', 
           'january' => '0.00', 
           'february' => '0.00', 
           'march' => '0.00', 
           'april' => '0.00', 
           'may' => '0.00', 
           'june' => '0.00', 
           'july' => '0.00', 
           'august' => '0.00', 
           'total' => '0.00',   
         ]);

       }
       $reminders  = Reminder::all();
       foreach($reminders as $reminder){
         $reminder->update([
           'reminder' => 9,
         ]);
       }
       $exists = DB::table('closings')->select('year')->where('year',date('Y'))->get()->first();
       if(isset($exists)){
         return back()->withErrors('current year Payment is already Finalized!');
       }
       $closing = new Closing;
       $closing->year = date('Y');
       $closing->total = $total;
       $closing->save();
      return back()->withSuccess('current year Payment is Finalized!');   
   
    }

}
