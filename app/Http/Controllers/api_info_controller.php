<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_api_code;
use App\Models\tbl_recharge_categories;
use App\Models\tbl_api_master;

class api_info_controller extends Controller
{
    public function index($id=1)
    {
        $array = array();
      /*  $data =  tbl_api_code::where('id', $id)->get();;

        $data=  tbl_api_master::all();
        $array = array(); */

        $joinData = tbl_api_code::select('*')
        ->join('tbl_recharge_categories', 'tbl_api_codes.category_id', '=', 'tbl_recharge_categories.id')
        ->join('tbl_my_operators', 'tbl_api_codes.operator_id', '=', 'tbl_my_operators.id')
        
        ->get();

        

        $all_api_master = tbl_api_master::all();

        foreach ($joinData as $data) 
        {
            $category_id =  $data->category_id;
            $api_id =  $data->api_id;

            foreach($all_api_master as $all_api_data)
            {
                if($all_api_data->id == $api_id)
                {
                    $api_data = $all_api_data;
                break;
                }
            }
      //      $api_data = tbl_api_master::where('id', $api_id)->get();
            
            $new_array = array('tbl_api_code'=>$data,'tbl_api_master'=>$api_data);
            array_push($array, $new_array);

        }
       
         
    
        return view('api_info',['array'=>$array,'all_api_master'=>$all_api_master,'id'=>$id]);

    }
      public function update(Request $request, tbl_api_code $tbl_api_code)
    {

        $res = tbl_api_code::where('id', $request->id)
        ->update(['operator_code' => $request->code,'api_status'=> $request->status]);
        
        echo $request->status;
        return redirect()->route('ApiInfo');
    }
}
