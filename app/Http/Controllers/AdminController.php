<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appoinment;
use Illuminate\Auth\Events\Login;

class AdminController extends Controller
{
    //
    public function add_view() {
        return view('admin.add_doctor');
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
            'speciality'=>'required',
            'password'=>'required',
            'Image'=>'required|mimes:png,jpg,jpeg,gif|max:10000'
        ]);
        $ImageName = time().'.'.$request->Image->extension();
        $request->Image->move(public_path('doctor_image'),$ImageName);

        $doctor = new Doctor();
        $doctor->image = $ImageName;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->password = $request->password;
        $doctor->save();
        return back()->withSuccess('Form Submitted !!!!!');
    }

    public function show_appointment(){
        $data = Appoinment::all();
        return view('admin.show_appointment',['show_appointment'=>$data]);
    }

    public function all_doctor(){
        $data = Doctor::all();
        return view('admin.all_doctor',['all_doctor'=>$data]);
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
        $doctor = Doctor::find($id);
        if (!$doctor) {
            // Handle the case where the doctor is not found
            return response()->json(['error' => 'Doctor not found.'], 404);
        }
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        if ($request->hasFile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $request->Image->move(public_path('doctor_image'), $imageName);
            $doctor->Image = $imageName;  // Update the image property
        }
        $doctor->save();
        return redirect('')->back();
        
}

}