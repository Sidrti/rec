<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_my_operator;
use App\Models\package_list;
use App\Models\fail_switch_detail;

class packagedetailsController extends Controller
{
    function index()
    {
    
       $joinData = package_list::select('*')
        ->join('tbl_my_operators', 'package_lists.operator_id', '=', 'tbl_my_operators.id')
        ->where('package_lists.package_id',1)
        ->get();
        

      return view('package_details',['data'=>$joinData]);


    }

    public function destroy(Request $request, fail_switch_detail $fail_switch_detail)
    {
        fail_switch_detail::destroy(array('id',$request->id));
        //return redirect('APITrailSettings');
    }

    function add(Request $request)
    {
        
        $fail_switch_detail = new fail_switch_detail();
        $fail_switch_detail->api_id=$request->api_id;                   //add fail switch master id
        $fail_switch_detail->minutes=$request->minutes;
        $fail_switch_detail->priority=$request->priority;
        $fail_switch_detail->fail_switch_master_id=$request->master_id; 
        $fail_switch_detail->save(); 

        //return redirect()->route('ApiSettings');

    }

    /*function edit(Request $request)
    {
        
        $res = tbl_sms_api::where('id', $request->id)
        ->update(['title' => $request->url,'title'=>$request->name]);
        return redirect()->route('SmsSettings');
    }*/
    
}