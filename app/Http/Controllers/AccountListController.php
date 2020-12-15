<?php

namespace App\Http\Controllers;
use App\Models\balance;
use App\Models\ledger;
use App\Models\receive_credit;
use App\Models\role;
use App\Models\role_master;
use App\Models\user_detail;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class AccountListController extends Controller
{
    public function index(Request $request)
    {
        //$role_id = [];
        $stock_sum = [];
        $credit_sum = [];
        $user_data = user::select('*')
            ->where('parent_id', User::find(Auth::user()->id)->id)
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('roles', 'roles.user_id', '=', 'user_details.user_id')
            ->join('role_masters', 'role_masters.id', '=', 'roles.role_id')
            ->get();

        if(!isset($user_data[0]) && empty($user_data[0])) {
            $user_data = [];
        }

        $auth_user_id = User::find(Auth::user()->id)->id;

        $current_role_id = role::select('role_id')
            ->where('user_id', $auth_user_id)
            ->get();

        if(!empty($current_role_id[0]['role_id'])) {
            $role_id = role_master::select('*')
                ->where('id', '>', $current_role_id[0]['role_id'])
                ->get();
        }

        $auth_balance = balance::select('user_id', 'balance')
            ->where('user_id', $auth_user_id)
            ->get();

        if(!isset($auth_balance[0]) && empty($auth_balance[0])) {
            $auth_balance = [];
        }

        for ($i = 0 ; $i < count($user_data) ; $i++) {
            $stock_sum[$user_data[$i]->user_id] = round(ledger::where('from_account_id', $auth_user_id)
                ->where('to_account_id', $user_data[$i]->user_id)
                ->sum('final_amount'), 2);
            
            $credit_sum[$user_data[$i]->user_id] = round(ledger::where('from_account_id', $auth_user_id)
                ->where('to_account_id', $user_data[$i]->user_id)
                ->where('mode', 'credit')
                ->sum('final_amount'), 2);

            $credit_subtract[$user_data[$i]->user_id] = round(receive_credit::where('from_account_id', $auth_user_id)
            ->where('to_account_id', $user_data[$i]->user_id)
            ->sum('amount'), 2);

            $stock_sum[$user_data[$i]->user_id] = isset($stock_sum[$user_data[$i]->user_id]) && !empty($stock_sum[$user_data[$i]->user_id]) ?
            $stock_sum[$user_data[$i]->user_id] : 0;

            $default_credit_sub[$user_data[$i]->user_id] = isset($credit_subtract[$user_data[$i]->user_id]) ? $credit_subtract[$user_data[$i]->user_id] : 0; 
            $credit_sum[$user_data[$i]->user_id] = isset($credit_sum[$user_data[$i]->user_id]) && !empty($credit_sum[$user_data[$i]->user_id]) ?
             ($credit_sum[$user_data[$i]->user_id] - $default_credit_sub[$user_data[$i]->user_id]) : 0;
        
        }
        
        return view('account_list', ['user_data' => $user_data, 'role_id' => $role_id, 'auth_balance' => $auth_balance,
            'stock_sum' => $stock_sum, 'credit_sum' => $credit_sum]);
    }

    public function updateStatus(Request $request)
    {
        $update_status = user_detail::where('user_id', $request->user_id)
            ->update(['isEnabled' => $request->status_id]);

        return redirect()->route('AccountList');
    }

    public function updateAccount(Request $request)
    {
        $user_details = user_detail::where('user_id', $request->user_id)
            ->update([
                'pan_number' => $request->pan,
                'gst_number' => $request->gst,
                'mobile_number' => $request->mob_no,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
            ]);

        $user = user::where('id', $request->user_id)
            ->update([
                'name' => $request->acc_name,
                'email' => $request->email,
            ]);
    }

    public function createAccount(Request $request)
    {
        $user_main = new user();
        $user_main->name = $request->acc_name;
        $user_main->email = $request->email;
        $user_main->password = Hash::make(rand(10, 15)); //@ToDo - Generate Random Password
        $user_main->parent_id = User::find(Auth::user()->id)->id;
        $user_main->save();
        $user_id = $user_main->id;

        $new_user_details = new user_detail();
        $new_user_details->pan_number = $request->pan;
        $new_user_details->gst_number = $request->gst;
        $new_user_details->mobile_number = $request->mob_no;
        $new_user_details->address = $request->address;
        $new_user_details->city = $request->city;
        $new_user_details->pincode = $request->pincode;
        $new_user_details->user_id = $user_id;
        $new_user_details->save();

        $user = new role();
        $user->role_id = $request->role_id;
        $user->user_id = $user_id;
        $user->save();
    }

    public function addTransferStock(Request $request) {
        $transfer_stock = new ledger();
        $transfer_stock->from_account_id = $request->from_id;
        $transfer_stock->to_account_id = $request->to_id;
        $transfer_stock->amount = $request->amount;
        $transfer_stock->percentage = $request->percent;
        $transfer_stock->final_amount = $request->final_amount;
        $transfer_stock->remarks = $request->remarks;
        $transfer_stock->mode = $request->mode_type;
        $transfer_stock->save();

        $balance_to = balance::select('balance')
        ->where('user_id', $request->to_id)->get();

        $balance_total = (float)$balance_to[0]['balance'] + $request->final_amount;
        $balance_to = balance::where('user_id', $request->to_id)
            ->update(['balance' => $balance_total]);

        $balance_from = balance::where('user_id', $request->from_id)
            ->update(['balance' => $request->remaining_balance]);

    }

    public function getIndividualStatements(Request $request) {
        $auth_user_id = User::find(Auth::user()->id)->id;

        $ledgers_data = ledger::select('*')
            ->where('from_account_id', $auth_user_id)
            ->where('to_account_id', $request->to_id)
            ->get();

        if($request->mode_name == 'credit') {
            return view('getdata_credit', ['credit_data' => $ledgers_data])->render();
        }
        else {
            return view('getdata', ['stock_data' => $ledgers_data])->render();
        }
    }

    public function receiveCredit(Request $request) {
        
            $transfer_credit = new receive_credit();
            $transfer_credit->from_account_id = $request->from_id;
            $transfer_credit->to_account_id = $request->to_id;
            $transfer_credit->amount = $request->credit_amount;
            $transfer_credit->remarks = $request->remarks;
            $transfer_credit->save();
    }
}
