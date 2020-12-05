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
    public function show(tbl_amount_filter $tbl_amount_filter, $id = 1)
    {
        $api_master =  tbl_api_master::all();
        $array = array();
        $joinData = tbl_amount_filter::select('*')
            ->rightjoin('tbl_my_operators', 'tbl_my_operators.id', '=', 'tbl_amount_filters.operator_id')
            ->get();


        $i = 0;
        foreach ($joinData as $data) {
            $category_data =  tbl_recharge_categories::where('id', $data->category_id)->get();
            $new_array = array('id' => $data->Id, 'amount' => $data->Amount, 'operator' => $data->operator, 'category' => $category_data[0]->name);
            array_push($array, $new_array);
            $i++;
        }

        return view('amount_filter', ['array' => $array, 'api_master' => $api_master]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_amount_filter $tbl_amount_filter)
    {
        $res = tbl_amount_filter::where('id', $request->id)
            ->update(['amount' => $request->amount]);
    }
}
