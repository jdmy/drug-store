<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
	{
		$data['stores']=\App\Store::all();
		$data['provinces']=\App\Province::all();
	    return view('store/index',$data);
	}
}
