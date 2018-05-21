<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $cid)
	{
		$products=\App\Category::find($cid)->products();
		$data['products']=$products->simplePaginate(3);
	    return view('product/index',$data);
	}

	

	public function showbyone($id)
	{
		$data['product']=\App\Product::find($id);
	    return view('product/showbyone',$data);
	}

}
