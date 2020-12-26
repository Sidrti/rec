<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\ledger;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\role_master;
use App\Models\tbl_capping;
use App\Models\tbl_capping_detail;
use App\Models\tbl_my_operator;
use Illuminate\Support\Facades\Auth;

class AccountCappingController extends Controller
{
    public function index(Request $request) {

        $stock_sum = [];
        $capped_id = [];
        $capped_value = [];
        $capping_operator_id = [];

        $user_data = user::select('*')
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->join('roles', 'roles.user_id', '=', 'user_details.user_id')
        ->join('role_masters', 'role_masters.id', '=', 'roles.role_id')
        ->get();

        if(!isset($user_data[0]) && empty($user_data[0])) {
            $user_data = [];
        }

        $operator_data = tbl_my_operator::select('id', 'operator')->get();
        $operator_data = isset($operator_data) && !empty($operator_data) ? $operator_data : '';

        $auth_user_id = User::find(Auth::user()->id)->id;

        $current_role_id = role::select('role_id')
            ->where('user_id', $auth_user_id)
            ->get();

        if(!empty($current_role_id[0]['role_id'])) {
            $role_id = role_master::select('*')
                ->where('id', '>', $current_role_id[0]['role_id'])
                ->get();
        }
        else {
            $role_id = [];
        }

        for ($i = 0 ; $i < count($user_data) ; $i++) {
            $stock_sum[$user_data[$i]->user_id] = round(ledger::where('from_account_id', $auth_user_id)
                ->where('to_account_id', $user_data[$i]->user_id)
                ->sum('final_amount'), 2);
            
            $stock_sum[$user_data[$i]->user_id] = (isset($stock_sum[$user_data[$i]->user_id]) && !empty($stock_sum[$user_data[$i]->user_id])) ? $stock_sum[$user_data[$i]->user_id] : '0.00';
        
            $capped[$user_data[$i]->user_id] = tbl_capping::where('user_id', $user_data[$i]->user_id)->orderBy('id', 'DESC')->get();
            $capped_value[$user_data[$i]->user_id] = (isset($capped[$user_data[$i]->user_id][0]->capped) && !empty($capped[$user_data[$i]->user_id][0])) ? 
            $capped[$user_data[$i]->user_id][0]->capped : '0';

            $capped_id[$user_data[$i]->user_id] = (isset($capped[$user_data[$i]->user_id][0]->id) && !empty($capped[$user_data[$i]->user_id][0])) ? 
            $capped[$user_data[$i]->user_id][0]->id : '';
        }

        for ($i = 0 ; $i < count($user_data) ; $i++) {
            $capping_operator_id[$user_data[$i]->user_id] = tbl_capping_detail::groupBy('operator_id')
            ->join('tbl_cappings', 'tbl_cappings.id', '=', 'tbl_capping_details.capping_id')
            ->where('tbl_cappings.user_id', $user_data[$i]->user_id)
            ->selectRaw('sum(current_capping) as current_capping, operator_id')
            ->pluck('current_capping','operator_id');
            
            $capping_operator_id[$user_data[$i]->user_id] = (isset($capping_operator_id[$user_data[$i]->user_id]) && !empty($capping_operator_id[$user_data[$i]->user_id])) ? 
            $capping_operator_id[$user_data[$i]->user_id] : '';
        }
        
        return view('account_capping', ['user_data' => $user_data, 'role_id' => $role_id, 'stock_sum' => $stock_sum, 'capped_id' => $capped_id, 'capped_value' => $capped_value,
         'operator_data' => $operator_data, 'capping_operator_id' => $capping_operator_id]);
    }

    public function updateCappedStatus(Request $request) {
        $tbl_capping = new tbl_capping();
        $tbl_capping->user_id = $request->user_id;
        $tbl_capping->capped = $request->status;
        $tbl_capping->save();

        return redirect()->route('AccountCapping');
    }

    public function updateCappingRecords(Request $request) {

        $ids = explode(',', $request->id);
        $capping_value = explode(',', $request->capping_value);

        for ($i = 0 ; $i < count($ids) ; $i++ ) {
            $tbl_capping_detail = new tbl_capping_detail();
            $tbl_capping_detail->operator_id = $ids[$i];
            $tbl_capping_detail->capping_id = $request->capping_id;
            $tbl_capping_detail->current_capping = $capping_value[$i];
            $tbl_capping_detail->save();
        }

        Session::flash('flash_message', 'Updated successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect()->route('AccountCapping');
    }

}
