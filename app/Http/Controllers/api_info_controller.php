<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\tbl_api_code;
use App\Models\tbl_api_master;
use App\Models\tbl_my_operator;
use Illuminate\Support\Facades\DB;

class api_info_controller extends Controller
{
    public function index($id = 0)
    {
        $api_data = null;
        $array = array();

        $joinData = new tbl_api_code();
        $joinData = $joinData->select('*', 'tbl_my_operators.id as operator_id')
            ->rightJoin('tbl_my_operators', 'tbl_my_operators.id', '=', 'tbl_api_codes.operator_id')
            ->join('tbl_recharge_categories', 'tbl_my_operators.category_id', '=', 'tbl_recharge_categories.id')
            ->whereRaw('tbl_api_codes.id in (select max(tbl_api_codes.id) from tbl_api_codes group by (tbl_api_codes.operator_id))')
            ->get();

        $operator_present = tbl_api_code::pluck('operator_id')->all();
        $remaining_operator = tbl_my_operator::whereNotIn('tbl_my_operators.id', $operator_present)
            ->select('*', 'tbl_my_operators.id as operator_id')
            ->join('tbl_recharge_categories', 'tbl_my_operators.category_id', '=', 'tbl_recharge_categories.id')
            ->get();

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

        return view('api_info', ['array' => $array, 'remaining_operator' => $remaining_operator, 'all_api_master' => $all_api_master, 'id' => $id]);
    }

    public function update(Request $request, tbl_api_code $tbl_api_code)
    {
        $insertApi = new tbl_api_code();
        $insertApi->operator_code = $request->code;
        $insertApi->api_status = $request->status;
        $insertApi->operator_id = $request->operator_id;
        $insertApi->category_id = $request->category_id;
        $insertApi->api_id = $request->api_id;
        $insertApi->save();

        Session::flash('flash_message', 'Saved successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect('ApiInfo/' . $request->api_id);
    }
}
