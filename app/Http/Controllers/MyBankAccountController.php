<?php

namespace App\Http\Controllers;
use App\Models\tbl_add_bank_account;
use Illuminate\Http\Request;

class MyBankAccountController extends Controller
{
    public function index(Request $request) {

        $bank_data =  tbl_add_bank_account::all();
        if(!isset($bank_data[0]) && empty($bank_data[0])) {
            $bank_data = [];
        }
        return view('my_bank_account', ['bank_data' => $bank_data]);
    }
}
