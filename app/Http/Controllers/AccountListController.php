<?php

namespace App\Http\Controllers;
use App\Models\user_detail;
use App\Models\user;
use App\Models\role_master;
use Illuminate\Http\Request;

class AccountListController extends Controller
{
    public function index (Request $request) {

        $user_data = user::select('*')
        ->where('isEnabled', 1)
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->join('roles', 'roles.user_id', '=', 'user_details.user_id')
        ->join('role_masters', 'role_masters.id', '=', 'roles.role_id')
        ->get();

        return view('account_list', ['user_data'=>$user_data]);
    }

    public function updateStatus (Request $request) {

        $update_status = user_detail::where('user_id', $request->user_id)
        ->update([ 'isEnabled' => $request->status_id ]);

        return redirect()->route('AccountList');
    }

    public function updateAccount (Request $request) {

        $user_details = user_detail::where('user_id', $request->user_id)
        ->update([
            'pan_number' => $request->pan,
            'gst_number' => $request->gst,
            'mobile_number' => $request->mob_no,
            'address' => $request->address,
            'city' => $request->city,
            'pincode' => $request->pincode,
        ]);

        $user = user::where('id', $request->user_id)
        ->update([
            'name' => $request->acc_name,
            'email' => $request->email,
        ]);
    }

    public function createAccount (Request $request) {

        // $user_details = user_detail::where('user_id', $request->user_id)
        // ->update([
        //     'pan_number' => $request->pan,
        //     'gst_number' => $request->gst,
        //     'mobile_number' => $request->mob_no,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'pincode' => $request->pincode,
        // ]);

        // $user = user::where('id', $request->user_id)
        // ->update([
        //     'name' => $request->acc_name,
        //     'email' => $request->email,
        // ]);
    }
}
