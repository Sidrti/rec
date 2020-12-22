<?php

namespace App\Http\Controllers;
use Session;
use App\Models\default_package;
use App\Models\role_master;
use App\Models\package_master;
use Illuminate\Http\Request;

class DefaultPackageController extends Controller
{
    public function index() {

        $package_data = default_package::select('*')
            ->join('package_masters', 'package_masters.id', '=', 'default_packages.package_master_id')
            ->join('role_masters', 'role_masters.id', '=', 'default_packages.role_id')
            ->get();

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
