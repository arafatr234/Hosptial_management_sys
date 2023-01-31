<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller{
   
    public function redirect(){
        if (Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctors=Doctor::all();
                return view ('user.home', compact('doctors'));
             }
            else {
                return view ('admin.home');
             }
        }
    }

  
    public function index(){
            if(Auth::id()){
                    return redirect('home');
                    //eitar meaning holo localhost:8000/home dile.admin hisebe login korle admin er 
                    //home page e jabe.but home ta kete diye localhost:8000 dileo login obsthay admin er page 
                    //ta show korbe
                    }
            else{
                    $doctors=Doctor::all();
                    return view ('user.home',compact('doctors'));
            }
    }

   
        public function appointment(Request $request){
                    $data= new appointment;
                    
                    $data->name=$request->name;
                    $data->email=$request->email;
                    $data->date=$request->date;
                    $data->phone=$request->number;
                    $data->message=$request->message;
                    $data->doctor=$request->doctor;
                    $data->status='In progress';
                    
                    if(Auth::id()){
                        $data->user_id=Auth::user()->id;
                    }
                    //login kora thakle user id ta jabe.otherwise user id sarai save hobe

                    $data->save();
                    return redirect()->back()->with('message','appointment Successfull.We will contact you soon');
        }



        public function myappointment(){
            if(Auth::id()){  
                $userid=Auth::user()->id;
                $appoint=appointment::where('user_id',$userid)->get();
                return view ('user.my_appointment',compact('appoint'));
            }
            else{
                return redirect()->back();
                //  localhost:8000/my_appointment likhle and login na kora thakle localhost:8000 ei page ei abar niye ahbe
            }
        
          }


          public function cancel_appoint($id){
                $data=appointment::find($id);
                $data->delete();
                return redirect()->back();
            }
    
}