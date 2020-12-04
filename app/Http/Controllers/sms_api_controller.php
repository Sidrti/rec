<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_sms_api;

class sms_api_controller extends Controller
{
    function index()
    {
    $data=  tbl_sms_api::all();

    return view('sms_api',['data'=>$data]);


    }
    public function destroy(Request $request, tbl_sms_api $tbl_sms_api)
    {
        tbl_sms_api::destroy(array('id',$request->id));
        return redirect('SmsSettings');
    }

    /*function edit(Request $request)
    {
        
        $res = tbl_sms_api::where('id', $request->id)
        ->update(['title' => $request->url,'title'=>$request->name]);

        return redirect()->route('SmsSettings');

    }*/
    
}
