<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
	public function index()
	{
		$data['stores']=\App\Store::all();
	    return view('admin/store/index',$data);
	}

    public function create()
	{
		$data['provinces']=\App\Province::all();
		$data['cities']=\App\City::all();
	    return view('admin/store/create',$data);
	}
}
