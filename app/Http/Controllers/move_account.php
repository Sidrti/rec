<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\user_detail;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class move_account extends Controller
{
    function index()
    {
        $auth_user_id = User::find(Auth::user()->id)->id;

        $roles = role::select('*')
        ->join('role_masters', 'roles.role_id', '<', 'role_masters.id')
        ->where('roles.user_id', '=',$auth_user_id )
        ->get();

         $child_users = user::select('*')
        ->where('parent_id', $auth_user_id)
        ->get();

        return view('move_account',['roles'=>$roles,'child_users'=>$child_users]);
    }
    function update(Request $request)
    {
        $update_status = role::where('user_id', $request->user_id)
        ->update([ 'role_id' => $request->role_id ]);
    }
}
