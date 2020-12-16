<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_new;

class header extends Controller
{
    public function Show()
    {
        $final_array = array();
        $array =  tbl_new::all();

        foreach ($array as $data) {

            if (strtotime($data->from_date) <= strtotime(date("Y-m-d")) && strtotime($data->to_date) >= strtotime(date("Y-m-d"))) {
                $new_array = array($data->title);
                array_push($final_array, $new_array);
            }
        }

        return $final_array;
        // return view('News', ['array' => $final_array]);
    }
}
