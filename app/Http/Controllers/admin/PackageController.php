<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Packages;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
	/**
	 * Show Packages.
	 */
	public function index()
	{
		$packages = Packages::get();
		return view('admin.packages.index', ['packages' => $packages]);
	}
	
	/**
	*	Renders view for editing package
	*
	*	@param int packageid
	*	@return void
	**/
	public function EditPackage($packageid){
		
		$package = Packages::where('id', $packageid)->get()->first();
		
		return view('admin.packages.edit', [
			'package' => $package
		]);
	}
	
	/**
	*	Updates the requested package to DB
	*
	*	@return void
	**/
	public function save(Request $request){
	
		$data = [
			'package_name'		=> $request->input('name'),
			'package_price'	=> $request->input('price'),
		];
	
		if($request->input('id')){
			Packages::where('id', $request->input('id'))->update($data);
				
			Session::flash('success', 'Data updated successfully.');
			return redirect('admin/package/edit/'.$request->input('id'));
		}else{
			
			Session::flash('success', 'Something went wrong');
			return redirect('admin/packages');
			
		}
	}
}
