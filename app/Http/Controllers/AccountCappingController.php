<?php

namespace App\Http\Controllers;
use App\Models\user_detail;
use App\Models\User;
use App\Models\ledger;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\tbl_capping;
use Illuminate\Support\Facades\Auth;

class AccountCappingController extends Controller
{
    public function index(Request $request) {

        $user_data = user::select('*')
        ->join('user_details', 'users.id', '=', 'user_details.user_id')
        ->join('roles', 'roles.user_id', '=', 'user_details.user_id')
        ->join('role_masters', 'role_masters.id', '=', 'roles.role_id')
        ->get();


        $auth_user_id = User::find(Auth::user()->id)->id;

        for ($i = 0 ; $i < count($user_data) ; $i++) {
            $stock_sum[$user_data[$i]->user_id] = round(ledger::where('from_account_id', $auth_user_id)
                ->where('to_account_id', $user_data[$i]->user_id)
                ->sum('final_amount'), 2);
            
            $stock_sum[$user_data[$i]->user_id] = (isset($stock_sum[$user_data[$i]->user_id]) && !empty($stock_sum[$user_data[$i]->user_id])) ? $stock_sum[$user_data[$i]->user_id] : '0.00';
        
            $capped_value[$user_data[$i]->user_id] = tbl_capping::where('user_id', $user_data[$i]->user_id)->orderBy('id', 'DESC')->get();
            $capped_value[$user_data[$i]->user_id] = (isset($capped_value[$user_data[$i]->user_id][0]->capped) && !empty($capped_value[$user_data[$i]->user_id][0])) ? 
            $capped_value[$user_data[$i]->user_id][0]->capped : '0';
        }

    return view('account_capping', ['user_data' => $user_data, 'stock_sum' => $stock_sum, 'capped_value' => $capped_value]);
    }

    public function updateCappedStatus(Request $request) {

        $tbl_capping = new tbl_capping();
        $tbl_capping->user_id = $request->user_id;
        $tbl_capping->capped = $request->status;
        $tbl_capping->save();

        return redirect()->route('AccountCapping');
    }

}
