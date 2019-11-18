<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Bus;
use App\Guardian;
use App\Student;
use App\Preclass;
use DB;

class StudentsController extends Controller
{
    
   
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('register');
    }
     
    public function viewAll(){
      $students = Student::all();
      return view('student.index')->withStudents($students);
    } 


    public function saveStudent(Request $request){
    
       $validation = Validator::make($request->all(),[
          'fname' => 'required|string|max:50',
          'mname' => 'required|string|max:50',
          'lname' => 'required|string|max:50',
          'gender' => 'required',
          'class' => 'required',
          'age' => 'required',
          'kebele' => 'required',
          'gfname' => 'required|string|max:50',   
          'gmname' => 'required|string|max:50',
          'glname' => 'required|string|max:50',
          'gkebele' => 'required',
       ]);

       if($validation->fails()){
           return back()->withErrors($validation)->withInput(); 
       }
       
         $student = new Student;
         $student->fname = $request->fname;
         $student->mname = $request->mname; 
         $student->lname = $request->lname;
         $student->gender = $request->gender;
         $student->class = $request->class;
         $student->section = $request->section;
         $student->age = $request->age;
         $student->kebele = $request->kebele;
         $student->save();
 
         $guardian = new Guardian;
         $guardian->fname = $request->gfname;
         $guardian->mname = $request->gmname;
         $guardian->lname = $request->glname;
         $guardian->job = $request->job;
         $guardian->kebele = $request->gkebele;
         $guardian->office = $request->office;
         $guardian->houseNo = $request->ghno;
         $guardian->housephone = $request->ghphone; 
         $guardian->mobilephone = $request->gmobile;
         $student->guardian()->save($guardian);

       if($request->has('bus')){
         if($request->bus == "1"){
              $bus_validation = Validator::make($request->all(),[
                 'bgFname' => 'required|string|max:50',
                 'bgMname' => 'required|string|max:50',
                 'bgLname' => 'required|string|max:50',
                 'brelation' => 'required',
                 'bdistance' => 'required',
                 'bkebele' => 'required',
              ]);
              if($bus_validation->fails()){
               return back()->withErrors($bus_validation)->withInput(); 
              }
               
              $bus = new Bus;
              $bus->fname = $request->bgFname;
              $bus->mname = $request->bgMname;
              $bus->lname = $request->bgLname;
              $bus->relation = $request->brelation;
              $bus->kebele = $request->bkebele;
              $bus->houesno = $request->bhno;
              $bus->mobilephone = $request->bmobile;
              $bus->km = $request->bdistance;
              $student->bus()->save($bus);
         }
       }

       if($request->has('nschool')) {
         if($request->nschool == "1") {
               $newStud_validation = Validator::make($request->all(),[
                 'school' => 'required|string|max:80',
                 'preclass' => 'required',
                 'gpa' => 'required',
               ]);
              if($newStud_validation->fails()){
               return back()->withErrors($newStud_validation)->withInput(); 
              } 
              
              $preclass = new Preclass;  
              $preclass->school_name = $request->school;
              $preclass->preclass = $request->preclass;
              $preclass->behaviour = $request->behave;
              $preclass->gpa = $request->gpa;
              $preclass->info = $request->descript;
              $student->preclass()->save($preclass);
         }
       }

       
      DB::table('payments')->insert([
       'student_id' => $student->id
      ]);
      DB::table('reminders')->insert([
       'student_id' => $student->id   
      ]);

       
       return back()->withSuccess('Student Registerd SuccessFully!');
    } 

  
    // detail about student
    public function showDetails($id){
       $student = Student::findOrFail($id);
       $siblings = [];
       $bus = $student->bus;
       $preclass = $student->preclass;
      //  $students = Student::all();
      //  foreach ($students as $stu) {
      //    if($stu->guardian->fname == $guardian->fname && $stu->guardian->mname == $guardian->mname && $stu->guardian->lname == $guardian->lname){

      //      if($stu->guardian->houseNo == $guardian->houseNo){
      //         if($stu->id != $student->id)
      //         $siblings = array_prepend($siblings, $stu);
      //      }
      //    }
      //  }
       return view('student.show')->withStudent($student)->withBus($bus)->withPreclass($preclass);
    
    }


    public function edit($id){
     $student = Student::findOrFail($id);
     $guardian = $student->guardian; 
     $bus = $student->bus;
     $preclass = $student->preclass;

     return view('student.edit')->withStudent($student)->withGuardian($guardian)->withBus($bus)->withPreclass($preclass);
    }

   

    public function update(Request $request , $id){
     
      $student = Student::findOrFail($id);

      $validation = Validator::make($request->all(),[
          'fname' => 'required|string|max:50',
          'mname' => 'required|string|max:50',
          'lname' => 'required|string|max:50',
          'gender' => 'required',
          'class' => 'required',
          'age' => 'required',
          'kebele' => 'required',
          'gfname' => 'required|string|max:50',   
          'gmname' => 'required|string|max:50',
          'glname' => 'required|string|max:50',
          'gkebele' => 'required',
          
       ]);

       if($validation->fails()){
           return back()->withErrors($validation)->withInput(); 
       }
       
         $student->update([
           'fname' => $request->fname,
           'mname' => $request->mname,
           'lname' => $request->lname,
           'gender' => $request->gender,
           'class' => $request->class,
           'section' => $request->section,
           'age' => $request->age,
           'kebele' => $request->kebele,
         ]);

         $student->guardian->update([
           'fname' => $request->gfname,
           'mname' => $request->gmname,
           'lname' => $request->glname,
           'job' => $request->job,
           'kebele' => $request->gkebele,
           'office' => $request->office,
           'houseNo' => $request->ghno,
           'housephone' => $request->ghphone,
           'mobilephone' => $request->gmobile,
         ]);

       return redirect()->route('student.viewall')->withSuccess('Student Updated SuccessFully!');

    }


    public function basic($id){
      $student = Student::findOrFail($id);
      return view('student.editbasic')->withStudent($student);
    }
    public function guardian($id){
      $student = Student::findOrFail($id);
      $guardian = $student->guardian;
      return view('student.editguard')->withGuardian($guardian)->withStudent($student);
    }
    public function bus($id){
      $student = Student::findOrFail($id);
      $bus = $student->bus;
      return view('student.editbus')->withBus($bus)->withStudent($student);
    }
    public function preclass($id){
      $student = Student::findOrFail($id);
      $preclass = $student->preclass;
      return view('student.editclass')->withPreclass($preclass)->withStudent($student);
    }
    
    // Basic info update
    public function basicUpdate(Request $request, $id){
       $student = Student::findOrFail($id);
       $validation =  Validator::make($request->all(),[
          'fname' => 'required|string|max:50',
          'mname' => 'required|string|max:50',
          'lname' => 'required|string|max:50',
          'gender' => 'required',
          'class' => 'required',
          'age' => 'required',
          'kebele' => 'required',
       ]);
       if($validation->fails()){
           return back()->withErrors($validation)->withInput(); 
       }
       $student->update([
           'fname' => $request->fname,
           'mname' => $request->mname,
           'lname' => $request->lname,
           'gender' => $request->gender,
           'class' => $request->class,
           'section' => $request->section,
           'age' => $request->age,
           'kebele' => $request->kebele,
       ]);

       return redirect()->route('student.detail', $id)->withSuccess('data updated successfully!');
          
    }
    // guardian update
    public function guardianUpdate(Request $request, $id){
       $student = Student::findOrFail($id); 
       $validation =  Validator::make($request->all(),[
          'gfname' => 'required|string|max:50',   
          'gmname' => 'required|string|max:50',
          'glname' => 'required|string|max:50',
          'gkebele' => 'required',
       ]);
       if($validation->fails()){
           return back()->withErrors($validation)->withInput(); 
       }
        $student->guardian()->update([
           'fname' => $request->gfname,
           'mname' => $request->gmname,
           'lname' => $request->glname,
           'job' => $request->job,
           'kebele' => $request->gkebele,
           'office' => $request->office,
           'houseNo' => $request->ghno,
           'housephone' => $request->ghphone,
           'mobilephone' => $request->gmobile,
        ]);

         return redirect()->route('student.detail', $id)->withSuccess('data updated successfully!');

    }
    // bus update
    public function busUpdate(Request $request, $id){
      $student = Student::findOrFail($id);
      $bus_validation = Validator::make($request->all(),[
         'bgFname' => 'required|string|max:50',
         'bgMname' => 'required|string|max:50',
         'bgLname' => 'required|string|max:50',
         'brelation' => 'required',
         'bdistance' => 'required',
         'bkebele' => 'required',
      ]);
      if($bus_validation->fails()){
        return back()->withErrors($bus_validation)->withInput(); 
      }

      if($student->bus){
        $student->bus()->update([
            'fname' => $request->bgFname,
            'mname' => $request->bgMname,
            'lname' => $request->bgLname,
            'relation' => $request->brelation,
            'kebele' => $request->bkebele,
            'houesno' => $request->bhno,
            'mobilephone' => $request->bmobile,
            'km' => $request->bdistance,
        ]);
         return redirect()->route('student.detail', $id)->withSuccess('data updated successfully!');
      }else{
         $bus = new Bus;
         $bus->fname = $request->bgFname;
         $bus->mname = $request->bgMname;
         $bus->lname = $request->bgLname;
         $bus->relation = $request->brelation;
         $bus->kebele = $request->bkebele;
         $bus->houesno = $request->bhno;
         $bus->mobilephone = $request->bmobile;
         $bus->km = $request->bdistance;
         $student->bus()->save($bus);
         return redirect()->route('student.detail', $id)->withSuccess('bus service started successfully!');
      } 

    }

    // pre class update
    public function preclassUpdate(Request $request, $id){
        $student = Student::findOrFail($id);
        $newStud_validation = Validator::make($request->all(),[
          'school' => 'required|string|max:80',
          'preclass' => 'required',
          'gpa' => 'required',
        ]);
        if($newStud_validation->fails()){
            return back()->withErrors($newStud_validation)->withInput(); 
        }
        
        if($student->preclass){
           $student->preclass()->update([
              'school_name' => $request->school,
              'preclass' => $request->preclass,
              'behaviour' => $request->behave,
              'gpa' => $request->gpa,
              'info' =>  $request->descript,
          ]);
          return redirect()->route('student.detail', $id)->withSuccess('bus service started successfully!');
        }else{

              $preclass = new Preclass;  
              $preclass->school_name = $request->school;
              $preclass->preclass = $request->preclass;
              $preclass->behaviour = $request->behave;
              $preclass->gpa = $request->gpa;
              $preclass->info = $request->descript;
              $student->preclass()->save($preclass);
              return redirect()->route('student.detail', $id)->withSuccess('bus service started successfully!');
        }

    }


    public function delete($id){
      $student = Student::findOrFail($id);
      $student->guardian()->delete();
      $student->bus()->delete();
      $student->preclass()->delete();
      DB::table('payments')->where('student_id', $id)->delete();
      DB::table('reminders')->where('student_id', $id)->delete();
      $student->delete();
      return back()->withSuccess('Student Deleted SuccessFully!');
    }


    public function stopBus($id){
      $student = Student::findOrFail($id);
      $student->bus()->delete();
      return back()->withSuccess('Bus Service is no longer available');   
    }

    public function stopPre($id){
      $student = Student::findOrFail($id);
      $student->preclass()->delete();
      return back()->withSuccess('pre-school data wiped SuccessFully!');
    }


}

