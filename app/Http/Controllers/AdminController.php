<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appoinment ;
use App\Models\Avaibility;
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
                return view('admin.add_doctor');
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

    public function upload(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            // 'availability_days'=>'required',
            // 'availability_days.*' => 'string|distinct', // Validate each day
            // 'start_time' => $request->start_time,
            // 'end_time' => $request->end_time,
            'location'=>'required',
            'speciality'=>'required',
            'description'=>'required',
            'Image'=>'required|mimes:png,jpg,jpeg,gif|max:10000'
        ]);
        $ImageName = time().'.'.$request->Image->extension();
        $request->Image->move(public_path('doctor_image'),$ImageName);

        $doctor = new Doctor();
        $doctor->image = $ImageName;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        // $doctor->availability_days = implode(',', $request->availability_days);
        $doctor->location = $request->location;
        $doctor->speciality = $request->speciality;
        $doctor->description = $request->description;
        $doctor->save();
        return back()->withSuccess('Form Submitted !!!!!');
    }

    public function show_appointment(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data = Appoinment::all();
                return view('admin.show_appointment',['show_appointment'=>$data]);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }


    }

    public function all_doctor(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data = Doctor::all();
                return view('admin.all_doctor',['all_doctor'=>$data]);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }
    public function delete_doctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_doctor($id){
        $data = Doctor::find($id);
        return view('admin.update_doctor',['update'=>$data]);
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
public function avaibility()
    {
        // return view('admin.ava_doctor');
        $doctors = Doctor::all(); // Fetch all doctors
        return view('admin.availibity', compact('doctors'));
    }

// public function ava_store(Request $request)
// {

//     $request->validate([
        // 'doctor_id' => 'required|exists:doctors,id',
        // 'availability_days' => 'required',
        // 'start_time' => 'required',
        // 'end_time' => 'required',
        // 'location' => 'required',

    //     'doctor_id' => 'required|exists:doctors,id',
    //     'availability_days.*' => 'string|distinct',  // Ensure it's an array
    //     'start_time' => 'required',
    //     'end_time' => 'required',
    //     'location' => 'required'
    // ]);

    // Ava::create([
    //     'doctor_id' => $request->doctor_id,  // Ensure doctor_id is passed
    //     'availability_days' => $request->availability_days,
    //     'start_time' => $request->start_time,
    //     'end_time' => $request->end_time,
    //     'location' => $request->location,
    // ]);
    
    // $ava = new Ava();
    // $ava->availability_days = implode(',', $request->availability_days);
    // $ava->start_time = $request->start_time;
    // $ava->end_time = $request->end_time;
    // $ava->location = $request->location;
    // $ava->save();


    // $ava = new Ava();
    // $ava->doctor_id = $request->doctor_id;  // Assign doctor_id
    // $ava->availability_days = implode(',', $request->availability_days);  // Implode if it's an array
    // $ava->start_time = $request->start_time;
    // $ava->end_time = $request->end_time;
    // $ava->location = $request->location;
    
    // // Save the Ava record
    // $ava->save();
    // return redirect()->back()->with('success', 'Availability updated successfully');
// }
public function avaibility_store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id', // Ensure doctor exists
        'days' => 'required|array|min:1',
        'days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        'start_time' => 'nullable',
        'end_time' => 'nullable',
    ]);

    // Store or update the availability for the doctor
    // Ava::updateOrCreate(
    //     [
    //         'doctor_id' => $request->doctor_id,
    //         'type' => $request->type,
    //     ],
    //     [
    //         'days' => json_encode($request->days),
    //         'start_time' => $request->start_time,
    //         'end_time' => $request->end_time,
    //     ]
    // );
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


}
