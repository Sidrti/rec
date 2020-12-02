<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_api_code;
use App\Models\tbl_recharge_categorie;
use App\Models\tbl_api_master;

class api_info_controller extends Controller
{
    public function index($id=true)
    {
        $array = array();
        $data =  tbl_api_code::where('id', $id)->get();;
        $all_api_master = tbl_api_master::all();

        foreach ($data as $data) 
        {
            $category_id =  $data->category_id;
            $api_id =  $data->api_id;

            $category_data=  tbl_recharge_categorie::where('id', $category_id)->get();
            $api_data = tbl_api_master::where('id', $api_id)->get();
            

            $new_array = array('tbl_api_code'=>$data,'tbl_recharge_categorie'=>$category_data,'tbl_api_master'=>$api_data);
            array_push($array, $new_array);

        }
      
        //return $array;
        return view('api_info',['array'=>$array,'all_api_master'=>$all_api_master]);

    }
      public function update(Request $request, tbl_api_code $tbl_api_code)
    {

        $res = tbl_api_code::where('id', $request->id)
        ->update(['api_code' => $request->code,'status'=>$request->status]);
        
        return redirect()->route('ApiInfo');
    }
}
