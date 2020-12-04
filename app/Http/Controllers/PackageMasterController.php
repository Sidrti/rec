<?php

namespace App\Http\Controllers;

use App\Models\package_master;
use Illuminate\Http\Request;

class PackageMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=  package_master::all();
        return view('package_master', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package_master = new package_master();
        $package_master->package_title=$request->title;
        $package_master->package_created_by=$request->username;
        $package_master->save();
       
       return redirect()->route('ManagePackage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\package_master  $package_master
     * @return \Illuminate\Http\Response
     */
    public function show(package_master $package_master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\package_master  $package_master
     * @return \Illuminate\Http\Response
     */
    public function edit(package_master $package_master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\package_master  $package_master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, package_master $package_master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\package_master  $package_master
     * @return \Illuminate\Http\Response
     */
    public function destroy(package_master $package_master)
    {
        //
    }
}
