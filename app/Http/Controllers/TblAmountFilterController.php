<?php

namespace App\Http\Controllers;

use App\Models\tbl_amount_filter;
use App\Models\tbl_recharge_categorie;
use App\Models\tbl_my_operator;
use App\Models\tbl_api_master;
use Illuminate\Http\Request;

class TblAmountFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_amount_filter  $tbl_amount_filter
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_amount_filter $tbl_amount_filter,$id=1)
    {
        $array = array();
        $tbl_amount_filter = tbl_amount_filter::where('api_id', $id)->get();

        $api_master=  tbl_api_master::all();


        
        $i = 0;
        foreach ($tbl_amount_filter as $data) 
        {
           
        
            $operator_data = tbl_my_operator::where('id',$data->operator_id)->get();
            $category_data =  tbl_recharge_categorie::where('id', $operator_data[0]->category_id)->get();

            $new_array = array('id'=>$data->Id ,'amount'=>$data->Amount,'operator'=>$operator_data[0]->operator,'category'=>$category_data[0]->name);
            array_push($array, $new_array);

            $i++;
        }
       
        return view('amount_filter',['array'=>$array,'api_master'=>$api_master]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_amount_filter  $tbl_amount_filter
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_amount_filter $tbl_amount_filter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_amount_filter  $tbl_amount_filter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_amount_filter $tbl_amount_filter)
    {

        $res = tbl_amount_filter::where('id', $request->update_id)
        ->update(['Amount' => $request->amount]);
        
        return redirect()->route('AmountFilter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_amount_filter  $tbl_amount_filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_amount_filter $tbl_amount_filter)
    {
        //
    }
}
