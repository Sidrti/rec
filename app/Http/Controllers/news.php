<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_new;

class news extends Controller
{
    function News_Data(Request $request)
    {
		
		$api_master = new tbl_new();
        $api_master->title=$request->get('name');
        $api_master->from_date=$request->get('FromDate');
        $api_master->to_date=$request->get('ToDate');
		$api_master->save();
		return view('dashboard');
		
    }
    function Show(Request $request)
    {
		$array=  tbl_new::all();
		
        return view('News',['array'=>$array]);
		
	}
}
