<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;


class ManagementController extends Controller
{
    //
    public function redirect(){
        if(Auth::check()){
            if(Auth::user()->usertype == '0'){
                return view('user.home');
            }else{
                return view('admin.home');
            }
        }else {
            return redirect('login');
        }
    }
    public function index(){
        return view('user.home');
    }
    public function about(){
        return view('user.about');
    }
    public function doctor(){
        return view('user.doctor');
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
}
