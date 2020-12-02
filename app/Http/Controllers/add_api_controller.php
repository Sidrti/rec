<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\tbl_api_master;

use Illuminate\Http\Request;

class add_api_controller extends Controller
{
    public function index(Request $request)
    {
        
        $api_master = new tbl_api_master();
        $api_master->api_name=$request->api_name;
        $api_master->url=$request->sample_url;
        $api_master->save(); 

        return redirect('ViewApi');

    }
    public function destroy(tbl_api_master $tbl_api_master,$id)
    {
        tbl_api_master::destroy(array('id',$id));
        return redirect('ViewApi');
    }
}
  
