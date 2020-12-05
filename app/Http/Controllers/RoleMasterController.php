<?php

namespace App\Http\Controllers;
use App\Models\role_master;
use Illuminate\Http\Request;

class RoleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=  role_master::all();
        return view('role_master', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      // return redirect()->route('ManagePackage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\package_master  $package_master
     * @return \Illuminate\Http\Response
     */
    public function show(role_master $role_master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role_master  $role_master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role_master $role_master)
    {
        //
    }
}
