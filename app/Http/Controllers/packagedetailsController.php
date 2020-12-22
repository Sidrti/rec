<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\tbl_my_operator;
use App\Models\package_list;
use App\Models\fail_switch_detail;

class packagedetailsController extends Controller
{
    function index(Request $request)
    {

        $joinData = package_list::select('*', 'tbl_my_operators.id as operator_id')
            ->join('tbl_my_operators', 'tbl_my_operators.id', '=', 'package_lists.operator_id')
            ->join('tbl_recharge_categories', 'tbl_my_operators.category_id', '=', 'tbl_recharge_categories.id')
            ->whereRaw('package_lists.id in (select max(package_lists.id) from package_lists where package_lists.package_id=' .
                $request->package_id . ' group by (package_lists.operator_id))')
            ->get();

        $operator_present = package_list::where('package_lists.package_id', $request->package_id)
            ->pluck('operator_id')->all();
        $remaining_operator = tbl_my_operator::whereNotIn('tbl_my_operators.id', $operator_present)
            ->select('*', 'tbl_my_operators.id as operator_id')
            ->join('tbl_recharge_categories', 'tbl_my_operators.category_id', '=', 'tbl_recharge_categories.id')
            ->get();

        return view('package_details', ['data' => $joinData, 'remaining_operator' => $remaining_operator,
         'package_id' => $request->package_id ]);
    }

    function updatePackage(Request $request)
    {
        $package_list = new package_list();
        $package_list->package_id = $request->package_id;
        $package_list->operator_id = $request->operator_id;
        $package_list->max = '25';
        $package_list->ded = $request->deduction;
        $package_list->ref = $request->referral;
        $package_list->save();

        Session::flash('flash_message', 'Updated successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect('PackageDetails/' . $request->package_id);

    }
}
