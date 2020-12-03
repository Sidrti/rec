<?php

namespace App\Http\Controllers;

use App\Models\fail_switch_detail;
use Illuminate\Http\Request;
use App\Models\tbl_api_master;
use App\Models\tbl_my_operator;
use App\Models\fail_switch_master;

class FailSwitchDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $operator_data = fail_switch_master::select('*')
        ->rightjoin('tbl_my_operators', 'tbl_my_operators.id', '=', 'fail_switch_masters.OperatorId')
        ->get();

       // $operator_data = tbl_my_operator::all();
      //echo json_encode($operator_data);
        $api_master =  tbl_api_master::all();
        return view('failed_switch',['api_master'=>$api_master,'operator_data'=>$operator_data]);
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
      
        $fail_master_id = 0;
        if($request->index == "0")
        {
        $fail_switch_master = new fail_switch_master();
        $fail_switch_master->OperatorId =$request->operator_id;
        $fail_switch_master->save(); 
        $fail_master_id = $fail_switch_master->id;
        }
        else
        {
            $fail_master_id = $request->master_id;
        }
        
        


        $fail_switch_detail = new fail_switch_detail();
        $fail_switch_detail->api_id = $request->api_id;
        $fail_switch_detail->minutes = $request->minutes;
        $fail_switch_detail->priority = $request->priority;
        $fail_switch_detail->fail_switch_master_id  = $fail_master_id;
        $fail_switch_detail->save(); 

        

         return $fail_master_id;;
    


       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fail_switch_detail  $fail_switch_detail
     * @return \Illuminate\Http\Response
     */
    public function show(fail_switch_detail $fail_switch_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fail_switch_detail  $fail_switch_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(fail_switch_detail $fail_switch_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fail_switch_detail  $fail_switch_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fail_switch_detail $fail_switch_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fail_switch_detail  $fail_switch_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(fail_switch_detail $fail_switch_detail)
    {
        //
    }
}
