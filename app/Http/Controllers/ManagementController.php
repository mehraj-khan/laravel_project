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

            // $doctors = Doctor::all();
            // return view('user.home', ['doctors' => $doctors]);
            // if (Auth::check()) {  // Check if the user is authenticated
            //     if (Auth::user()->usertype == 0) {
            //         // Normal user, load user home view
            //         $doctors = Doctor::all();
            //         return view('user.home', ['doctors' => $doctors]);
            //     } else {
            //         // Admin user or other types, load admin home view
            //         return view('admin.home');
            //     }
            // } else {
            //     // If the user is not authenticated, redirect back to previous page
            //     return redirect()->back();
            // }

            // if(Auth::id()){
            //     if(Auth::user()->usertype == '0'){
            //         $doctors = Doctor::all();
            //         return view('user.home', ['doctors' => $doctors]);
            //     }elseif(Auth::user()->usertype == '1'){
            //         return view('admin.home');
            //     }
            //     else{
            //         return view('admin.home');
            //     }
            // }
           

            if (Auth::id()) {
                $usertype = Auth::user()->usertype;
        
                // Normal user
                if ($usertype == '0') {
                    $doctors = Doctor::all();
                    return view('user.home', ['doctors' => $doctors]);
                }
                // Admin user
                elseif ($usertype == '1') {
                    return view('admin.home');
                }
                // Fallback to admin home for any other usertype
                else {
                    return view('admin.home');
                }
            } else {
                // If user is not authenticated, redirect to the homepage or login page
                return redirect()->route('login')->with('error', 'Please log in first.');
            }

        
    }
    public function index()
{
    if (Auth::id()) {
        $usertype = Auth::user()->usertype;

        // Normal user
        if ($usertype == '0') {
            $doctors = Doctor::all();
            return view('user.home', ['doctors' => $doctors]);
        }
        // Admin user
        elseif ($usertype == 1) {
            return view('admin.home');
        } elseif ($usertype == 2) {
            return view('admin.add_doctor');
        }
        // Fallback to admin home for any other usertype
        else {
            $doctors = Doctor::all();
            return view('user.home', ['doctors' => $doctors]);
        }
    } else {
        // If user is not authenticated, redirect to the homepage or login page
             $doctors = Doctor::all();
            return view('user.home', ['doctors' => $doctors]);

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


        public function search(Request $request)
{
    $query = Doctor::query();

   
     if ($request->has('location') || $request->has('speciality')) {
        // Get search inputs
        $location = $request->input('location');
        $speciality = $request->input('speciality');

        // Query doctors based on location and specialization
        $doctors = Doctor::where('location', 'LIKE', "%{$location}%")
                         ->where('speciality', 'LIKE', "%{$speciality}%")
                         ->get();
    } else {
        // Get all doctors if no search criteria are provided
        $doctors = Doctor::all();
    }

    return view('user.find_doctor', compact('doctors'));
}

    }
