<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appoinment;

// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;


    class ManagementController extends Controller
    {
    //     //
        public function redirect(){
        if(Auth::check()){
            if(Auth::user()->usertype == '0'){
                return view('user.home');
            } else {
                return view('admin.home');
            }
        } else {
            return redirect('login');
        }
    }
        public function index(){
            if(Auth::id()){
                return redirect('home');
            }else{
            return view('user.home');
            $do = doctor::all();
            return view('user.home',['doctor' => $do]);
            }
        }
        public function about(){
            return view('user.about');
        }
        public function doctor(){
            // return view('user.doctor');
            $doctor = doctor::all();
            return view('user.doctor',['doctor'=>$doctor]);
        }

        public function treatments(){
            return view('user.treatments');
        }
        public function blog(){
            return view('user.blog');
        }
        public function contact(){
            return view('user.contact');
        }
        public function appoinment(Request $request){
            $doctor = doctor::all();
            if(Auth::id()){
            return view('user.appoinment',['doctor'=>$doctor]);
            }else{
                return redirect('login');
            }
        }
        public function book_appoinment(Request $request){
            $request->validate([
                'name'=>'required',
                'phone'=>'required',
                'select_doctor'=>'required',
                'gender'=>'required',
                'date'=>'required'
            ]);
            $appoinment = new Appoinment();
            $appoinment->name = $request->name;
            $appoinment->phone = $request->phone;
            $appoinment->select_doctor = $request->select_doctor;
            $appoinment->gender = $request->gender;
            $appoinment->date = $request->date;
            if(Auth::id()){
            $appoinment->user_id =Auth::user()->id;
            }
            $appoinment->save();
            return redirect()->back()->withSuccess('Appointment  Request Successful. We will contact with you soon !!!!!');
        }
        public function myappoinment(){
            if(Auth::id()){
                if(Auth::user()->usertype==0){
                    $userid = Auth::user()->id;
                $appoinment = appoinment::where('user_id',$userid)->get();
                return view('user.myappoinment',['appoint'=>$appoinment]);
                }

            }else
            {
                return redirect()->back();
            }
        }
        public function delete_appointment($id){
            $data = appoinment::find($id);
            $data->delete();
            return redirect()->back();
        }
    }
