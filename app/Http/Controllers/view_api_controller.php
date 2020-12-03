<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_api_master;

class view_api_controller extends Controller
{
    function index()
    {
    $data=  tbl_api_master::all();

    return view('view_api',['data'=>$data]);

    }

    function edit(Request $request)
    {
        
        $res = tbl_api_master::where('id', $request->id)
        ->update(['url' => $request->url,'api_name'=>$request->name]);

        return redirect()->route('ApiSettings');

    }
    
}
