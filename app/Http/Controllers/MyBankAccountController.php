<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyBankAccountController extends Controller
{
    public function index(Request $request) {
        return view('my_bank_account');
    }
}
