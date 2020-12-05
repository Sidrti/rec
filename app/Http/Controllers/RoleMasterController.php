<?php

namespace App\Http\Controllers;

use App\Models\role_master;
use Illuminate\Http\Request;

class RoleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  role_master::all();
        return view('role_master', ['data' => $data]);
    }
}
