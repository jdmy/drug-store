<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
	{
		$data['main_categories']=\App\MainCategory::all();
	    return view('category/index',$data);
	}

	
}
