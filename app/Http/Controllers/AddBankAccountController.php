<?php

namespace App\Http\Controllers;
use App\Models\tbl_add_bank_account;
use Session;
use Illuminate\Http\Request;

class AddBankAccountController extends Controller
{
    public function addNewAccount(Request $request) {
        
        $addBank = new tbl_add_bank_account();
        $addBank->bank_name = $request->bank_name;
        $addBank->account_no = $request->account_no;
        $addBank->ifsc_code = $request->ifsc_code;
        $addBank->branch_name = $request->branch_name;
        $addBank->save();

        Session::flash('flash_message', 'Added successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect()->route('MyBankAccount');
    }
}
