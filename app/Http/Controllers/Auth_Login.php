<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\reviewer;
use App\Models\student;
use App\Models\supervisor;
use Illuminate\Http\Request;

class Auth_Login extends Controller
{
    public function index()
    {
        if (session()->has('Admin_Auth_Session')) {
            return redirect('/AdminDashboard');
        } else {

            $formroute = 'Auth.login';
            return view('Authentication.Admin_Login')->with(compact('formroute'));
        }
    }



    public function login(Request $request)
    {
        // dd($request);


        $admin = admin::where('Username', $request->username)->where('Password', $request->password)->get();

        if ($admin->isEmpty()) {

            return redirect()->back()
                ->with('toast_type', 'error')
                ->with('toast_location', 'top right')
                ->with('toast_head', 'Admin Not Found')
                ->with('toast_message', 'Dear Admin Enter Your Details Correctly !');
        } else {
            $admin = $admin->first();
            session()->put('Admin_Auth_Session', $admin->Email);
            session()->flash('toast_type', 'success');
            session()->flash('toast_location', 'top left');
            session()->flash('toast_head', 'Loggined Successfully');
            session()->flash('toast_message', 'Welcome Admin good to see you  !');
            return redirect('/AdminDashboard');
        }
    }





    public function logout()
    {
        if (session()->has('Admin_Auth_Session')) {

            session()->flush();
            return redirect('/')
                ->with('toast_type', 'warning')
                ->with('toast_location', 'top right')
                ->with('toast_head', 'Logged Out')
                ->with('toast_message', 'Dear Logged Out Sucessfully!');
        } else {
            return redirect('/');
        }
    }
}
