<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appoinment ;
use App\Models\Avaibility;
use App\Models\Blog;
use App\Models\speciality;
use Illuminate\Auth\Events\Login;

class AdminController extends Controller
{

    // public function redirect(){
    //     if(Auth::id()){
    //         if(Auth::user()->usertype == 1 ){
    //             return view('admin.home');
    //         } else {
    //             return view('user.home');
    //         }
    //     } else {
    //         return redirect('login');
    //     }
    // }
    //
    public function add_view() {
        if(Auth::id()){
            if(Auth::user()->usertype==2 || Auth::user()->usertype == 1){
                // return view('admin.add_doctor');
            $availabilities = Avaibility::with('doctor')->get();

                // Fetch doctors separately if you want to use them directly
                $doctors = Doctor::all(); 

                // Return the view with the availabilities and doctors data
                return view('admin.add_doctor', compact('availabilities', 'doctors'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();  // Log out the user

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to login page after logout
        return redirect('/login');
    }

    public function upload(Request $request) {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'location' => 'required',
            'speciality' => 'required',
            'description' => 'required',
            'Image' => 'required|mimes:png,jpg,jpeg,gif|max:10000'
        ]);
    
        // Ensure the image file is valid
        if ($request->hasFile('Image') && $request->file('Image')->isValid()) {
            // Generate unique name for the image
            $ImageName = time() . '.' . $request->Image->extension();
    
            // Move the image to the 'doctor_image' directory in 'public'
            $request->Image->move(public_path('doctor_image'), $ImageName);
    
            // Create a new doctor record
            $doctor = new Doctor();
            $doctor->Image = $ImageName;
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            $doctor->location = $request->location;
            $doctor->speciality = $request->speciality;
            $doctor->description = $request->description;
    
            // Save the doctor record
            $doctor->save();
    
            // Redirect back with success message
            return back()->withSuccess('Form Submitted!');
        }
    
        // If no valid image, return an error
        return back()->withErrors('Image upload failed.');
    }
    

 

    public function show_appointment() {
        // Ensure the user is logged in
        if (Auth::check()) {
            // Get the logged-in user's usertype
            $usertype = Auth::user()->usertype;
    
            // If the user is an admin, show all appointments
            if ($usertype == '1') {
                // Admin: Show all appointments
                $show_appointment = Appoinment::all();
            } 
            // If the user is a doctor, show only their appointments
            elseif ($usertype == '2') {
                // Doctor: Show only the appointments related to the logged-in doctor
                $doctorName = Auth::user()->name; // Assuming the doctor's name is stored in 'name'
                $show_appointment = Appoinment::where('select_doctor', $doctorName)->get();
            } 
            // Normal user should not have access to this
            else {
                return redirect('home')->with('error', 'Access denied!');
            }
    
            // Pass the filtered appointments to the view
            return view('admin.show_appointment', compact('show_appointment'));
        } else {
            // If the user is not authenticated, redirect to login
            return redirect('login');
        }
    }
    
    
   
    public function all_doctor()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 1) {
                // Eager load availability data for all doctors
                $data = Doctor::with('availabilities')->get(); // Fetch all doctors with their availability data
            } elseif ($usertype == 2) {
                $doctorName = Auth::user()->name;
                // Eager load availability data for the logged-in doctor
                $data = Doctor::with('availabilities')->where('name', $doctorName)->get(); // Fetch logged-in doctor with availability data
            } else {
                return redirect()->back();
            }
    
            // Return the view with the fetched data
            return view('admin.all_doctor', ['all_doctor' => $data]);
        } else {
            return redirect('login');
        }
    }
    
    public function delete_doctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function delete_avaibility($id){
        $data = Avaibility::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_doctor($id){
        $data = Doctor::find($id);
        return view('admin.update_doctor',['update'=>$data]);
    }
    public function edit_avaibility($id){
        $doctor = Doctor::with('availabilities')->find($id);

        // Check if the doctor exists
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found');
        }
    
        // Return the edit form view with the doctor's data
        return view('admin.edit_avaibility', compact('doctor'));
    }
    public function edit_doctor(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            // 'availability_days' => 'required|string|max:255',
            // 'availability_days.*' => 'string|distinct', // Validate each day
            'location' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);


        $doctor = Doctor::find($id);
        if (!$doctor) {
            // Handle the case where the doctor is not found
            return response()->json(['error' => 'Doctor not found.'], 404);
        }
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->phone=$request->phone;
        // $doctor->availability_days=$request->availability_days;
        $doctor->location=$request->location;
        $doctor->speciality=$request->speciality;
        $doctor->description=$request->description;
        if ($request->hasFile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $request->Image->move(public_path('doctor_image'), $imageName);
            $doctor->Image = $imageName;  // Update the image property
        }
        $doctor->save();
        return redirect()->back()->withSuccess('Form Updated !!!!!');

}
public function update_avaibility(Request $request, $id)
{
    // // Validation
    $request->validate([
        'days' => 'required',
        // 'days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        'start_time' => 'required',
        'end_time' => 'required',
        'location' => 'required',
    ]);
    
    // Find the availability record
    $availabilities = Avaibility::where('doctor_id', $id)->get();

    // Check if any records exist
    if ($availabilities->isEmpty()) {
        return back()->with('error', 'No availability found for this doctor.');
    }
    
    // Loop through each availability record
    foreach ($availabilities as $index => $Ava) {
        // Update the availability details
        $Ava->days = json_encode($request->days[$index] ?? []); // Ensure this is handled as expected
        $Ava->start_time = $request->start_time[$index] ?? null; 
        $Ava->end_time = $request->end_time[$index] ?? null;
        $Ava->location = $request->location[$index] ?? null;

        // Save the updated record
        $Ava->save();
    }

    return back()->with('success', 'Availability updated successfully!');
}





public function avaibility()
{
    // Ensure the user is logged in
    if (Auth::check()) {
        // Get the logged-in user's usertype
        $usertype = Auth::user()->usertype;

        // If the user is an admin, show all doctors and availabilities
        if ($usertype == '1') {
            $doctors = Doctor::all(); // Admin sees all doctors
            $availabilities = Avaibility::with('doctor')->get(); // Admin sees all availabilities
        }
        // If the user is a doctor, show only their own data
        elseif ($usertype == '2') {
            $doctorName = Auth::user()->name; // Get the logged-in doctor's name

            // Fetch only the logged-in doctor's information
            $doctors = Doctor::where('name', $doctorName)->get();

            // Fetch only the logged-in doctor's availabilities
            $availabilities = Avaibility::with('doctor')
                ->whereHas('doctor', function ($query) use ($doctorName) {
                    $query->where('name', $doctorName);
                })
                ->get();
        } else {
            // Redirect or handle unauthorized access for other usertypes (if any)
            return redirect('home')->with('error', 'Unauthorized access');
        }

        // Pass data to the view
        return view('admin.availibity', compact('doctors', 'availabilities'));
    } else {
        // Redirect to login if not authenticated
        return redirect('login');
    }
}
public function avaibility_update() {
    if (Auth::check()) {
        // Get the logged-in user's usertype
        $usertype = Auth::user()->usertype;

        // If the user is an admin, show all doctors and availabilities
        if ($usertype == '1') {
            // Admin sees all doctors with their availabilities
            $doctors = Doctor::with('availabilities')->get(); // Eager load availability data
        }
        // If the user is a doctor, show only their own data
        elseif ($usertype == '2') {
            $doctorName = Auth::user()->name; // Get the logged-in doctor's name

            // Fetch only the logged-in doctor's information with their availabilities
            $doctors = Doctor::with('availabilities')->where('name', $doctorName)->get();
        } else {
            // Redirect or handle unauthorized access for other user types (if any)
            return redirect('home')->with('error', 'Unauthorized access');
        }

        // Pass data to the view
        return view('admin.update_avaibility', compact('doctors'));
    } else {
        // Redirect to login if not authenticated
        return redirect('login');
    }
}



public function avaibility_store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id', // Ensure doctor exists
        'days' => 'required|array|min:1',
        'days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        'start_time' => 'required',
        'end_time' => 'required',
        'location'=> 'required'
    ]);

    // dd($request->days); 
    $Ava = new Avaibility();
    $Ava->doctor_id = $request->doctor_id;
    $Ava->days = json_encode($request->days);
    $Ava->start_time = $request->start_time;
    $Ava->end_time = $request->end_time;
    $Ava->location = $request->location;
    $Ava->save();


    return back()->with('success', 'Doctor availability updated successfully!');
}

public function news(){

    $data = Blog::all();
    return view('admin.news',compact('data'));
}

public function news_store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'date' => 'required',
        'image'=> 'required'
    ]);

    // dd($request->days); 
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Generate unique name for the image
        $ImageName = time() . '.' . $request->image->extension();

        // Move the image to the 'doctor_image' directory in 'public'
        $request->image->move(public_path('news_image'), $ImageName);

        // Create a new doctor record
        $Blog = new Blog();
        $Blog->image = $ImageName;
        $Blog->title = $request->title;
        $Blog->content = $request->content;
        $Blog->date = $request->date;   
        // Save the doctor record
        $Blog->save();

        // Redirect back with success message
        return back()->withSuccess('Form Submitted!');
    }
}
public function show_news(){

    $show = Blog::all();
    return view('admin.show_news',compact('show'));
}

public function delete_news($id){
    $news = Blog::find($id);
    $news->delete();
    return redirect()->back();
}

public function update_news($id){
    $data = Blog::find($id);
    return view('admin.news_update',['update'=>$data]);
}

public function edit_news(Request $request, $id){

    $request->validate([
        'title' => 'required|string|max:255',       
        'content' => 'required|string|max:255',
        'date' => 'required|string|max:255',
    ]);


    $doctor = Blog::find($id);
    // if (!$doctor) {
    //     // Handle the case where the doctor is not found
    //     return response()->json(['error' => 'Doctor not found.'], 404);
    // }
    $doctor->title=$request->title;
    $doctor->content=$request->content;
    $doctor->date=$request->date;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('doctor_image'), $imageName);
        $doctor->image = $imageName;  // Update the image property
    }
    $doctor->save();
    return redirect()->back()->withSuccess('Form Updated !!!!!');

}

}