<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Doctor;
use App\Models\Appointment;
class homeController extends Controller
{
    public function redirect(){
         if(Auth::id()){
          if(Auth::user()->usertype=='0'){
            $doctor=Doctor::all();
                return view('user.home',compact('doctor'));
          }else{
            return view('admin.home');
          }
         }else{
            return redirect()->back();
         }
    }
    public function index(){

      if(Auth::id()){
         return redirect('home');
      }
      else{

        $doctor=Doctor::all();

        return view('user.home',compact('doctor'));
      }
    }
    public function appointment(Request $request){
      $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'date' => 'required|string|max:255',
        'doctor' => 'required|string|max:255',
        'number' => 'required|string|max:255',
        'message' => 'required|string|max:400',
    ]);
    $data=new Appointment;
    
    $data->name=$request->name;
    $data->email=$request->email;
    $data->date=$request->date;
    $data->doctor=$request->doctor;
    $data->phone=$request->number;
    $data->message=$request->message;
    $data->status='In progress';

    if(Auth::id()){

      $data->user_id=Auth::user()->id;
    }
    $data->save();
    return redirect()->back()->with("message",'Appointment added successfully.We will contact with you soon');
    }

    public function my_appointment(){
      if(Auth::id()){
        if(Auth::user()->usertype==0){

          $user_id=Auth::user()->id;
          $appoint=Appointment::where('user_id',$user_id)->get();
        return view('user.myappointment',compact('appoint'));
        }else{
          return redirect()->back();
        }
      }else{
        return redirect('login');
      }
    }

    public function cancel_appointment($id){
         $data=Appointment::find($id);
         $data->delete();
         return redirect()->back();
    }

    public function contact(){
      return view('user.footer');
    }
}
