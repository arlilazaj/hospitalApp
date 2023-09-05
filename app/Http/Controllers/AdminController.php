<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function addview(){
        if(Auth::id()){

            if(Auth::user()->usertype==1){

                return view('admin.add_doctor');
            }else{
                return  redirect()->back();
            }

        }else{
           return redirect('login');
        }
    }

    public function upload(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'roomNumber' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 
        ]);
        $doctor = new Doctor;

        if ($request->hasFile('image')) { // Check if a file was uploaded
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('doctorImage', $imagename);
            $doctor->image = $imagename;
        }
    
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->roomNumber;
    
        $doctor->save();
        return redirect()->back()->with('message','Doctor added succsessfully');
    }
    public function showAppointment(){
        if(Auth::id()){

            if(Auth::user()->usertype==1){

                $data=Appointment::all();
                return view('admin.showAppointment',compact('data'));
                
            }else{
                return  redirect()->back();
            }

        }else{
           return redirect('login');
        }
    }
    public function approved($id){
        $data=Appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

    public function showDoctor(){
        $data=Doctor::all();
        return view("admin.allDoctors",compact('data'));

    }
    public function deleteDoctor($id){
        $data=Doctor::find($id);
        $data->delete();
    
        return redirect()->back();
    }
   public function updateDoctor($id){
     $data=Doctor::find($id);
      return view('admin.updateDoctors',compact('data'));
   }

   public function editDoctor(Request $request,$id){
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'speciality' => 'required|string|max:255',
        'roomNumber' => 'required|string|max:255',
       
    ]);
      $data=Doctor::find($id);
      $data->name=$request->name;
      $data->phone=$request->phone;
      $data->speciality=$request->speciality;
      $data->room=$request->roomNumber;

      
      if ($request->hasFile('image')) { // Check if a file was uploaded
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('doctorImage', $imagename);
        $data->image = $imagename;
    }
    $data->save();

    return redirect()->back()->with('message','Doctor updated successfully');   
   }
}
