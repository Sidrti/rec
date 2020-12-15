<?php

namespace App\Http\Controllers;

use App\Models\package_master;
use Illuminate\Http\Request;

class PackageMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=  package_master::all();
        if(!isset($data[0]) && empty($data[0])) {
            $data = [];
        }
        return view('package_master', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package_master = new package_master();
        $package_master->package_title=$request->title;
        $package_master->package_created_by=$request->username;
        $package_master->save();
       
       return redirect()->route('ManagePackage');
    }
}
