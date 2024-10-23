<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Avaibility;
use App\Models\Appoinment;
use App\Models\Blog;

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
            $data = Blog::all(); //['doctors' => $doctors]
            return view('user.home', compact('doctors','data'));
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
            $data = Blog::all();
           return view('user.home', compact('doctors','data'));
        }
    } else {
        // If user is not authenticated, redirect to the homepage or login page
             $doctors = Doctor::all();
             $data = Blog::all();
            return view('user.home', compact('doctors','data'));

    }
    
} 

public function newabouts() {
    // Check if user is authenticated
    if (Auth::id()) {
        $usertype = Auth::user()->usertype;

        if ($usertype == '0') {
            return view('user.about');  // Normal user
        } elseif ($usertype == 1) {
            return view('admin.home');  // Admin
        } elseif ($usertype == 2) {
            return view('admin.add_doctor');  // Doctor
        }
    } else {
        // If user is not logged in, still return the user.about page
        return view('user.about');
    }
}
        public function doctor(){
            // return view('user.doctor');
            if (Auth::id()) {
                $usertype = Auth::user()->usertype;
        
                // Normal user
                if ($usertype == '0') {
                    $doctor = doctor::all();
                    return view('user.doctor',['doctor'=>$doctor]);
                }elseif ($usertype == 1) {
                    return view('admin.home');
                } elseif ($usertype == 2) {
                    return view('admin.add_doctor');
                }
            }else {
                // If user is not logged in, still return the user.about page
                $doctor = doctor::all();
                return view('user.doctor',['doctor'=>$doctor]);
            }



        }

        public function treatments(){
            if (Auth::id()) {
                $usertype = Auth::user()->usertype;
        
                // Normal user
                if ($usertype == '0') {
                    return view('user.treatments');
                }elseif ($usertype == 1) {
                    return view('admin.home');
                } elseif ($usertype == 2) {
                    return view('admin.add_doctor');
                }
            }else {
                // If user is not logged in, still return the user.about page
                return view('user.treatments');
            }


        }
        public function blog(){
            
            if (Auth::id()) {
                $usertype = Auth::user()->usertype;
        
                // Normal user
                if ($usertype == '0') {
                    $data = Blog::all();
                    return view('user.blog' , compact('data'));
                }elseif ($usertype == 1) {
                    return view('admin.home');
                } elseif ($usertype == 2) {
                    return view('admin.add_doctor');
                }
            }else {
                // If user is not logged in, still return the user.about page
                $data = Blog::all();
                return view('user.blog', compact('data'));
            }
        }
        public function contact(){         
            if (Auth::id()) {
                $usertype = Auth::user()->usertype;        
                // Normal user
                if ($usertype == '0') {
                    return view('user.contact');
                }elseif ($usertype == 1) {
                    return view('admin.home');
                } elseif ($usertype == 2) {
                    return view('admin.add_doctor');
                }
            }else {
                // If user is not logged in, still return the user.about page
                return view('user.contact');
            }
            
        }
        // public function appoinment(Request $request){
  
        //     if (Auth::id()) {
        //         $usertype = Auth::user()->usertype;        
        //         // Normal user
        //         if ($usertype == '0') {
        //             $doctor = doctor::all();
        //     if(Auth::id()){
        //     return view('user.appoinment',['doctor'=>$doctor]);
        //     }else{
        //         return redirect('login');
        //     }
        //         }elseif ($usertype == 1) {
        //             return view('admin.home');
        //         } elseif ($usertype == 2) {
        //             return view('admin.add_doctor');
        //         }
        //     }else {
        //         // If user is not logged in, still return the user.about page
        //         $doctor = doctor::all();
        //         return view('user.appoinment',['doctor'=>$doctor]);
        //     }

        //     // $doctor = doctor::all();
        //     // if(Auth::id()){
        //     // return view('user.appoinment',['doctor'=>$doctor]);
        //     // }else{
        //     //     return redirect('login');
        //     // }
        // }
        public function appoinment(Request $request) {
            // Check if the user is authenticated
            if (Auth::check()) {
                // Get the logged-in user's usertype
                $usertype = Auth::user()->usertype;
        
                // Check if the user is a normal user (usertype == 0)
                if ($usertype == '0') {
                    // Fetch all doctors
                    $doctor = doctor::all();
                    // Return the appointment view with the list of doctors
                    return view('user.appoinment', ['doctor' => $doctor]);
                } elseif ($usertype == '1') {
                    // If the user is an admin, redirect to the admin home page
                    return view('admin.home');
                } elseif ($usertype == '2') {
                    // If the user is a doctor/admin, redirect to the add doctor page
                    return view('admin.add_doctor');
                } else {
                    // Default fallback if the usertype is unexpected
                    return redirect('login');
                }
            } else {
                // If the user is not authenticated, redirect them to the login page
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
    // $request->validate([
    //     'location' => 'required|string',
    //     'speciality' => 'required|string',
    //     // ... other validation rules
    // ]);
    
    // Get all unique locations for the dropdown
    $allLocations = Doctor::select('location')->distinct()->pluck('location');
    $allSpecialities = Doctor::select('speciality')->distinct()->pluck('speciality');
    // Initialize a query for doctors
    $query = Doctor::query();

    // Get search inputs
    $location = $request->input('location');
    $speciality = $request->input('speciality');

    // Apply filters if they are provided
    if (!empty($location)) {
        $query->where('location', 'LIKE', "%{$location}%");
    }

    if (!empty($speciality)) {
        $query->where('speciality', 'LIKE', "%{$speciality}%");
    }

    // Execute the query and get the result
    $doctors = $query->get();

    // Return the view with doctors and all locations for dropdown
    return view('user.find_doctor', compact('doctors', 'allLocations', 'allSpecialities'));
}

public function getSchedule($id)
{
    // Assuming you have a 'schedules' relationship on the Doctor model
    $doctor = Doctor::find($id);
    if ($doctor) {
        // Assuming 'Avaibility' returns the doctor's schedule
        $schedule = $doctor->Avaibility;
        return response()->json($schedule);  // Ensure you're returning a valid JSON response
    }

    return response()->json([]);
}


// public function avaibilities(){
//     $availabilities = Avaibility::with('doctor')->get();

//     // Fetch doctors separately if you want to use them directly
//     $doctors = Doctor::all(); 

//     // Return the view   with the availabilities and doctors data
//     return view('user.avaibilities', compact('availabilities', 'doctors'));

// }
public function avaibilities(){
    $availabilities = Avaibility::with('doctor')->get();
    $doctors = Doctor::all(); 

    // Return the view with the availabilities and doctors data
    return view('user.avaibilities', compact('availabilities', 'doctors'));
}


    }
