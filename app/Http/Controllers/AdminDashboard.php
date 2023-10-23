<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\reviewer;
use App\Models\student;
use App\Models\supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminDashboard extends Controller
{
    public function index()
    {
        // session()->flash('toast_type', 'success');
        // session()->flash('toast_location', 'top center');
        // session()->flash('toast_head', 'Loggined Successfully');
        // session()->flash('toast_message', 'Welcome Admin !');


        return view('Admin.Admin_Dashboard');
    }


    // ============================================= ADMIN==========================================

    public function Add_Admin()
    {
        $formroute = '/AddAdminData';
        return view('Admin.Add_Admin')->with(compact('formroute'));
    }

    public function Add_Admin_data(Request $request)
    {

        // dd($request);

        $validatedData = $request->validate([
            'Name' => 'required',
            'Username' => 'required|unique:admins,Username',
            'Email' => 'required|unique:admins,Email|email',
            'Password' => 'required',
            'Status' => 'required',
        ]);


        $data = admin::create([
            'Name' => request('Name'),
            'Username' => request('Username'),
            'Email' => request('Email'),
            'Password' => request('Password'),
            'Status' => request('Status'),

        ]);
        // dd($data);
        // $admin_record = admin::create($data);


        if ($data) {
            return response()->json(['message' => 'Admin Added successfully']);
        }


        return redirect()->back();
    }



    public function All_Admin_data()
    {

        $all_admin_records = admin::all();
        $formroute = '/UpdateAdminData';


        return view('Admin.All_Admin', compact('all_admin_records', 'formroute'));
    }

    public function Del_Admin_data($id)
    {
        // $record = admin::find($id);
        // dd($record);
        // $record->delete();

        $affectedRows = admin::where('Id', $id)->delete();

        return response()->json(['toast_message' => 'Admin Deleted Successfully']);
    }

    public function Update_Admin_data(Request $request)
    {

        $validatedData_UpdateAdmin = $request->validate([
            'Name' => 'required',
            'Password' => 'required',
        ]);

        $Update_Admin_Result = admin::where('Id', $request->Id)->update($validatedData_UpdateAdmin);

        if ($Update_Admin_Result) {

            return response()->json(['message' => 'Admin Updated Successfully']);
        } else {
            return response()->json(['message' => 'Error! Admin Updated Failed !']);
        }
    }
}
