<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
	public function index()
	{
		$data['stores']=\App\Store::all();
		$data['provinces']=\App\Province::all();
	    return view('admin/store/index',$data);
	}

    public function create()
	{
		$data['provinces']=\App\Province::all();
		
	    return view('admin/store/create',$data);
	}

	public function store(Request $request)
	{
	    $store = new \App\Store;
	    $store->name = $request->get('name');
	    $store->phone = $request->get('phone');
	    $store->address = $request->get('address');
	    $store->cityid = $request->get('cityid');
	    if ($store->save()) {
	        return redirect('admin/stores');
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

	public function city_ajax($provinceid)
	{
		$data['cities']=\App\Province::where('provinceid',$provinceid)->first()->cities;
		return view('admin/store/city_ajax',$data);
	}
}
