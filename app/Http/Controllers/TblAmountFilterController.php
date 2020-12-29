<?php

namespace App\Http\Controllers;

use App\Models\tbl_amount_filter;
use App\Models\tbl_recharge_categories;
use App\Models\tbl_my_operator;
use App\Models\tbl_api_master;
use Illuminate\Http\Request;

class TblAmountFilterController extends Controller
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
    public function show(tbl_amount_filter $tbl_amount_filter, $id = 0)
    {
        $api_master =  tbl_api_master::all();
        $array = array();
        if($id != 0)   {
        $joinData = tbl_amount_filter::select('*')
            ->rightjoin('tbl_my_operators', 'tbl_my_operators.id', '=', 'tbl_amount_filters.operator_id')
            ->get();
        

        $i = 0;
        foreach ($joinData as $data) {
           
            $category_data =  tbl_recharge_categories::where('id', $data->category_id)->get();
            $new_array = array('id' => $data->Id, 'amount' => $data->Amount, 'operator' => $data->operator,'operator_id' => $data->id,
             'category' => $category_data[0]->name,'api_id'=>$data->api_id);
            array_push($array, $new_array);
            $i++;
            
        }
    }
        return view('amount_filter', ['array' => $array, 'api_master' => $api_master,'selected_api_id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_amount_filter $tbl_amount_filter)
    {
        $res = tbl_amount_filter::where('Id', $request->id)
            ->update(['amount' => $request->amount]);
    }
    public function insert(Request $request)
    {
        $tbl_amount_filter = new tbl_amount_filter();
        $tbl_amount_filter->api_id = $request->api_id;
        $tbl_amount_filter->operator_id = $request->operator_id;
        $tbl_amount_filter->amount = $request->amount;
        $tbl_amount_filter->save();
    }
}
