<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\user_detail;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountListController extends Controller
{
    public function index(Request $request)
    {
        $user_data = user::select('*')
            ->where('isEnabled', 1)
            ->where('parent_id', User::find(Auth::user()->id)->id)
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('roles', 'roles.user_id', '=', 'user_details.user_id')
            ->join('role_masters', 'role_masters.id', '=', 'roles.role_id')
            ->get();

        $auth_user_id = User::find(Auth::user()->id)->id;

        $current_role_id = role::select('role_id')
            ->where('user_id', $auth_user_id)
            ->get();

        $role_id = role::select('*')
            ->where('role_id', '>', $current_role_id[0]['role_id'])
            ->join('role_masters', 'role_masters.id', '=', 'roles.role_id')
            ->get();

        return view('account_list', ['user_data' => $user_data], ['role_id' => $role_id]);
    }

    public function updateStatus(Request $request)
    {
        $update_status = user_detail::where('user_id', $request->user_id)
            ->update(['isEnabled' => $request->status_id]);

        return redirect()->route('AccountList');
    }

    public function updateAccount(Request $request)
    {
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

    public function createAccount(Request $request)
    {
        $user_main = new user();
        $user_main->name = $request->acc_name;
        $user_main->email = $request->email;
        $user_main->password = Hash::make(rand(10, 15)); //ToDo - Generate Random Password
        $user_main->parent_id = User::find(Auth::user()->id)->id;
        $user_main->save();
        $user_id = $user_main->id;

        $new_user_details = new user_detail();
        $new_user_details->pan_number = $request->pan;
        $new_user_details->gst_number = $request->gst;
        $new_user_details->mobile_number = $request->mob_no;
        $new_user_details->address = $request->address;
        $new_user_details->city = $request->city;
        $new_user_details->pincode = $request->pincode;
        $new_user_details->user_id = $user_id;
        $new_user_details->save();

        $user = new role();
        $user->role_id = $request->role_id;
        $user->user_id = $user_id;
        $user->save();
    }

    // function rand_password( $length ) {
    //     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    //     return substr(str_shuffle($chars),0,$length);
    // }
}
