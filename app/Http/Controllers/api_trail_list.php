<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fail_switch_detail;
use App\Models\tbl_my_operator;
use App\Models\tbl_api_master;

class api_trail_list extends Controller
{
    function index()
    {
     
      $all_api_master = tbl_api_master::all();

       $fail_switch_master = tbl_my_operator::select('*')
       ->join('fail_switch_masters', 'fail_switch_masters.OperatorId', '=', 'tbl_my_operators.id')
       ->get();
        
      $data = tbl_api_master::select('*')
        ->join('fail_switch_details', 'fail_switch_details.api_id', '=', 'tbl_api_masters.id')
        ->get();

       

        

      return view('API_Trail',['data'=>$data,'fail_switch_master'=>$fail_switch_master,'all_api_master'=>$all_api_master]);


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
