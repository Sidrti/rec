<?php

namespace App\Http\Controllers;
use Session;
use App\Models\default_package;
use App\Models\role_master;
use App\Models\package_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefaultPackageController extends Controller
{
    public function index() {

        $package_data = DB::select('SELECT d1.*, p.package_title, r.role_name
        FROM default_packages d1 LEFT JOIN default_packages d2 
        ON (d1.role_id = d2.role_id AND d1.id < d2.id) 
        JOIN package_masters p ON p.id = d1.package_master_id 
        JOIN role_masters r ON r.id = d1.role_id 
        WHERE d2.id IS NULL;');

        $roles = role_master::all();
        $package_master = package_master::all();

        if (!isset($roles[0]) && empty($roles[0])) {
            $roles = [];
        }
        if (!isset($package_master[0]) && empty($package_master[0])) {
            $package_master = [];
        }
        if(!isset($package_data[0]) && empty($package_data[0])) {
            $package_data = [];
        }

        return view('default_package', ['package_data' => $package_data, 'roles' => $roles, 'package_master' => $package_master]);
    }

    public function updatePackage(Request $request) {
        $default_package = new default_package();
        $default_package->role_id = $request->role_id;
        $default_package->package_master_id = $request->package_id;
        $default_package->save();

        Session::flash('flash_message', 'Added successfully.');
        Session::flash('flash_type', 'alert-success');

        return redirect()->route('DefaultPackage');
    }
}
