<?php

namespace App\Http\Controllers;

use Session;
use App\Models\tbl_my_operator;
use Illuminate\Http\Request;
use App\Models\tbl_recharge_categories;
use App\Models\tbl_api_master;

class TblMyOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_my_operator $tbl_my_operator)
    {
        $array = array();
        $api_array = array();
        $tbl_my_operator_data = tbl_my_operator::all();
        $tbl_api_master =  tbl_api_master::all();

        $i = 0;
        foreach ($tbl_my_operator_data as $data) {
            $fin_array = array();
            $api = array('api_1' => $data->api_1, 'api_2' => $data->api_2, 'api_3' => $data->api_3);
            $category_id =  $data->category_id;
            $category_data =  tbl_recharge_categories::where('id', $category_id)->get();

            for ($count = 0; $count < count($api); $count++) {
                $api_data =  tbl_api_master::where('id', array_values($api)[$count])->get();
                $api_name = isset($api_data[0]->api_name) ? $api_data[0]->api_name : '';
                $api_url = isset($api_data[0]->url) ? $api_data[0]->url : '';

                $new_array = array(('api_name' . ($count + 1)) => $api_name, ('api_url' . ($count + 1)) => $api_url);
                array_push($fin_array, $new_array);
            }
            array_push($api_array, $fin_array);

            if ($data->status == 0) {
                $temp = 'STOP';
            } 
            else {
                $temp = 'START';
            }

            $new_array = array(
                'id' => $data->id, 'operator' => $data->operator, 'code' => $data->code, 'status' => $temp,
                'status_value' => $data->status, 'category_name' => $category_data[0]->name
            );
            array_push($array, $new_array);
            $i++;
        }
        return view('operatorlist', ['array' => $array, 'api_array' => $api_array, 'tbl_api_master' => $tbl_api_master]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_my_operator $tbl_my_operator)
    {
        $operator_api_id = 'api_' . $request->operator_api_id;
        $update_operator_api_id = tbl_my_operator::where('id', $request->operator_id)
            ->update([$operator_api_id => $request->api_id]);

        return redirect()->route('OperatorList');
    }

    /**
     * Update the status value (START->STOP, STOP->START).
     */
    public function updateStatus(Request $request, tbl_my_operator $tbl_my_operator)
    {
        $operator_status_value = 0;
        if ($request->status_id == 1) {
            $operator_status_value = 0;
        } else {
            $operator_status_value = 1;
        }
        $update_status_id = tbl_my_operator::where('id', $request->operator_id)
            ->update(['status' => $operator_status_value]);

        return redirect()->route('OperatorList');
    }

    /**
     * Remove the api value.
     */
    public function removeAPI(Request $request, tbl_my_operator $tbl_my_operator)
    {
        $operator_api_id = 'api_' . $request->api_id;
        $update_remove_api = tbl_my_operator::where('id', $request->operator_id)
            ->update([$operator_api_id => null]);

        Session::flash('flash_message', 'Remove successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect()->route('OperatorList');
    }
}
