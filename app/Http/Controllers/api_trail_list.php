<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\fail_switch_detail;
use App\Models\tbl_my_operator;
use App\Models\tbl_api_master;

class api_trail_list extends Controller
{
    function index(Request $request)
    {
        $operatorId = 0;
        if ($request->operator_id) {
            $operatorId = $request->operator_id;
        }

        $all_api_master = tbl_api_master::all();

        $fail_switch_master = tbl_my_operator::select('*')
            ->join('fail_switch_masters', 'fail_switch_masters.OperatorId', '=', 'tbl_my_operators.id')
            ->get();

        $data = tbl_api_master::select('*')
            ->join('fail_switch_details', 'fail_switch_details.api_id', '=', 'tbl_api_masters.id')
            ->join('fail_switch_masters', 'fail_switch_masters.id', '=', 'fail_switch_details.fail_switch_master_id')
            ->where('fail_switch_masters.OperatorId', '=', $operatorId)
            ->get();

        return view('API_Trail', ['data' => $data, 'fail_switch_master' => $fail_switch_master, 'all_api_master' => $all_api_master]);
    }

    public function destroy(Request $request)
    {
        $deleted_id  = fail_switch_detail::where('fail_switch_details_id', $request->id)
            ->delete();
    }

    function add(Request $request)
    {
    }

    //update the records
    function updateRecords(Request $request)
    {
        $ids = explode(',', $request->id);
        $priority_d = explode(',', $request->priority);
        $minutes_d = explode(',', $request->minutes);
        $apis = explode(',', $request->api_id);

        for ($i = 0; $i < count($ids); $i++) {
            if ($ids[$i] != 0) {
                $update_status = fail_switch_detail::where('fail_switch_details_id', $ids[$i])
                    ->update(['minutes' => $minutes_d[$i], 'priority' => $priority_d[$i]]);
            } else {
                $fail_switch_detail = new fail_switch_detail();
                $fail_switch_detail->api_id = $apis[$i];   //add fail switch master id
                $fail_switch_detail->minutes = $minutes_d[$i];
                $fail_switch_detail->priority = $priority_d[$i];
                $fail_switch_detail->fail_switch_master_id = $request->master_id;
                $fail_switch_detail->save();
            }
        }

        Session::flash('flash_message', 'Updated successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect('/APITrailSettings/' . $request->select_op);
    }
}
