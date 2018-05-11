<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($cid)
	{
		$data['products']=\App\Category::find($cid)->products;
	    return view('product/index',$data);
	}

	public function showbyone($id)
	{
		$data['product']=\App\Product::find($id);
	    return view('product/showbyone',$data);
	}
}
