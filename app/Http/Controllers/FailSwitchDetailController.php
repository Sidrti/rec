<?php

namespace App\Http\Controllers;

use App\Models\fail_switch_detail;
use Illuminate\Http\Request;
use App\Models\tbl_api_master;
use App\Models\fail_switch_master;

class FailSwitchDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operator_data = fail_switch_master::select('*')
            ->rightjoin('tbl_my_operators', 'tbl_my_operators.id', '=', 'fail_switch_masters.OperatorId')
            ->get();

        // $operator_data = tbl_my_operator::all();
        //echo json_encode($operator_data);
        $api_master =  tbl_api_master::all();
        return view('failed_switch', ['api_master' => $api_master, 'operator_data' => $operator_data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fail_master_id = 0;
        if ($request->index == "0") {
            $fail_switch_master = new fail_switch_master();
            $fail_switch_master->OperatorId = $request->operator_id;
            $fail_switch_master->save();
            $fail_master_id = $fail_switch_master->id;
        }
        else {
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

}
