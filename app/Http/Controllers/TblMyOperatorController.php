<?php

namespace App\Http\Controllers;

use App\Models\tbl_my_operator;
use Illuminate\Http\Request;
use App\Models\tbl_recharge_categories;
use App\Models\tbl_api_master;

class TblMyOperatorController extends Controller
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
     * @param  \App\Models\tbl_my_operator  $tbl_my_operator
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_my_operator $tbl_my_operator)
    {
        $array = array();
        $api_array = array();
        $tbl_my_operator_data = tbl_my_operator::all();
        $tbl_api_master =  tbl_api_master::all();

        
        $i = 0;
        foreach ($tbl_my_operator_data as $data) 
        {
            $fin_array = array();
            $api = array('api_1' => $data->api_1, 'api_2' => $data->api_2, 'api_3' => $data->api_3);
            $category_id =  $data->category_id;
            $category_data=  tbl_recharge_categories::where('id', $category_id)->get();
            
            for ($count = 0; $count < count($api); $count++) {
                $api_data=  tbl_api_master::where('id',array_values($api)[$count])->get();
                $api_name = isset($api_data[0]->api_name) ? $api_data[0]->api_name : '';
                $api_url = isset($api_data[0]->url) ? $api_data[0]->url : '';

                $new_array = array(('api_name' . ($count+1)) => $api_name, ('api_url' . ($count+1)) => $api_url);
                array_push($fin_array, $new_array);
            }
            array_push($api_array, $fin_array);

            $new_array = array('id'=>$data->id,'operator'=>$data->operator,'code'=>$data->code,'status'=>$data->status, 'category_name'=>$category_data[0]->name);
            array_push($array, $new_array);
            $i++;
        }
        return view('operatorlist', ['array'=>$array, 'api_array'=>$api_array, 'tbl_api_master'=>$tbl_api_master]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_my_operator  $tbl_my_operator
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_my_operator $tbl_my_operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_my_operator  $tbl_my_operator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_my_operator $tbl_my_operator)
    {
        $operator_api_id = 'api_' . $request->operator_api_id;
        $update_operator_api_id = tbl_my_operator::where('id', $request->operator_id)
        ->update([ $operator_api_id => $request->api_id]);
        
        return redirect()->route('OperatorList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_my_operator  $tbl_my_operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_my_operator $tbl_my_operator)
    {
        //
    }
}
