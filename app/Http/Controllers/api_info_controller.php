<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_api_code;
use App\Models\tbl_api_master;
use Illuminate\Support\Facades\DB;

class api_info_controller extends Controller
{
    public function index($id = 0)
    {
        $api_data = null;
        $array = array();
      /*  select * from tbl_api_codes Right JOIN tbl_my_operators ON tbl_api_codes.operator_id=tbl_my_operators.id INNER JOIN tbl_recharge_categories ON tbl_my_operators.category_id=tbl_recharge_categories.id where tbl_api_codes.id in
(select max(tbl_api_codes.id) from tbl_api_codes group by tbl_api_codes.operator_id,tbl_api_codes.api_id)

        $joinData = tbl_api_code::select('*')
            ->rightjoin('tbl_my_operators', 'tbl_api_codes.operator_id', '=', 'tbl_my_operators.id')
            ->join('tbl_recharge_categories', 'tbl_my_operators.category_id', '=', 'tbl_recharge_categories.id')
            ->wherein('tbl_api_codes')
            ->get(); */

            $joinData = DB::select('select * from tbl_api_codes Right JOIN tbl_my_operators ON tbl_api_codes.operator_id=tbl_my_operators.id INNER JOIN tbl_recharge_categories ON tbl_my_operators.category_id=tbl_recharge_categories.id where tbl_api_codes.id in
            (select max(tbl_api_codes.id) from tbl_api_codes  group by tbl_api_codes.operator_id )');
           // where tbl_api_codes.api_id='.$id.'

        $all_api_master = tbl_api_master::all();

        foreach ($joinData as $data) {
            $category_id =  $data->category_id;
            $api_id =  $data->api_id;

            foreach ($all_api_master as $all_api_data) {
                if ($all_api_data->id == $api_id) {
                    $api_data = $all_api_data;
                    break;
                }
            }

            $new_array = array('tbl_api_code' => $data, 'tbl_api_master' => $api_data);
            array_push($array, $new_array);
        }
     //   print_r( json_encode($array));
      

        return view('api_info', ['array' => $array, 'all_api_master' => $all_api_master, 'id' => $id]);
    }

    public function update(Request $request, tbl_api_code $tbl_api_code)
    {
     /*   $res = tbl_api_code::where('id', $request->id)
        ->update(['operator_code' => $request->code, 'api_status' => $request->status]); */

     //   echo $res;
    /* echo '<br>';
        echo 'ID - '.$request->id;
        echo '<br>';
        echo 'operator_code - '.$request->code;
        echo '<br>';
        echo 'api_status - '.$request->status; */

        $insertApi = new tbl_api_code();
        $insertApi->operator_code = $request->code;
        $insertApi->api_status = $request->status;
        $insertApi->operator_id = $request->operator_id;
        $insertApi->category_id = $request->category_id;
        $insertApi->api_id = $request->api_id;
        $insertApi->save();

       // $res = tbl_api_code::updateOrCreate(['id' => $request->id],
       // ['operator_code' => $request->code,'api_status'=>$request->status,'category_id'=>$request->category_id,'api_id'=>$request->api_id,'operator_id'=>$request->operator_id]);

       return redirect()->route('ApiInfo');
    }
}
