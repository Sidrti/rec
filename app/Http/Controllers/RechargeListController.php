<?php

namespace App\Http\Controllers;
use App\Models\role_master;
use App\Models\tbl_recharge_categories;
use App\Models\tbl_my_operator;
use App\Models\tbl_api_master;
use Illuminate\Http\Request;

class RechargeListController extends Controller
{
    public function index(Request $request) {

        $roles = role_master::all();
        if(!isset($roles[0]) && empty($roles[0])) {
            $roles = [];
        }

        $recharge_categories = tbl_recharge_categories::all();
        if(!isset($recharge_categories[0]) && empty($recharge_categories[0])) {
            $recharge_categories = [];
        }

        $operators = tbl_my_operator::all();
        if(!isset($operators[0]) && empty($operators[0])) {
            $operators = [];
        }

        $api_list = tbl_api_master::all();
        if(!isset($api_list[0]) && empty($api_list[0])) {
            $api_list = [];
        }

        return view('recharge_list' , ['roles' => $roles, 'recharge_categories' => $recharge_categories, 
        'operators' => $operators, 'api_list' => $api_list]);
    }
}
