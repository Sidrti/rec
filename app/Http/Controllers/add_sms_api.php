<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\tbl_sms_api;

use Illuminate\Http\Request;

class add_sms_api extends Controller
{
    public function index(Request $request)
    {
        
        $api_master = new tbl_sms_api();
        $api_master->title=$request->title;
        $api_master->sms_url=$request->sample_url;
        $api_master->save(); 

        return redirect('SmsSettings');

    }
    /*public function destroy(tbl_sms_api $tbl_api_master,$id)
    {
        tbl_sms_api::destroy(array('id',$id));
        return redirect('SmsSettings');
    }*/
}
  
