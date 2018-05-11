<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
	{
		$data['stores']=\App\Store::all();
	    return view('store/index',$data);
	}
}
