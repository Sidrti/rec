<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fail_switch_detail;

class api_trail_list extends Controller
{
    function index()
    {
        
    $data = fail_switch_detail::select('*')
        ->join('tbl_api_masters', 'fail_switch_details.api_id', '=', 'tbl_api_masters.id')
        ->get();

    return view('API_Trail',['data'=>$data]);


    }

    public function destroy(Request $request, fail_switch_detail $fail_switch_detail)
    {
        fail_switch_detail::destroy(array('id',$request->id));
        //return redirect('APITrailSettings');
    }

    function add(Request $request)
    {
        
        $api_master = new fail_switch_detail();
        $api_master->api_id=$request->id;                   //add fail switch master id
        $api_master->minutes=$request->minutes;
        $api_master->priority=$request->priority;
        $api_master->save(); 

        //return redirect()->route('ApiSettings');

    }

    /*function edit(Request $request)
    {
        
        $res = tbl_sms_api::where('id', $request->id)
        ->update(['title' => $request->url,'title'=>$request->name]);

        return redirect()->route('SmsSettings');

    }*/
    
}
