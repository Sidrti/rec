<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_new;

class news extends Controller
{
    function News_Data(Request $request)
    {
		
		$api_master = new tbl_new();
        $api_master->title=$request->title;
        $api_master->from_date=$request->from_date;
        $api_master->to_date=$request->to_date;
		$api_master->save();
		$array=  tbl_new::all();
		
        return view('News',['array'=>$array]);
		
    }
    function Show(Request $request)
    {
		$array=  tbl_new::all();
		
        return view('News',['array'=>$array]);
		
	}

	public function destroy(Request $request, tbl_new $tbl_new)
    {
        tbl_new::destroy(array('id',$request->id));
        $array=  tbl_new::all();
        return view('News',['array'=>$array]);
    }
}
