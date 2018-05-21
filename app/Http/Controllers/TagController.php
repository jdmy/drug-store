<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function search(Request $request)
    {
    	$content=$request->get('content');
    	$content=trim($content);
    	$tags=\App\Tag::where('name', 'like', '%'.$content.'%')
    					->get();
    	$categories=\App\Category::where('name', 'like', '%'.$content.'%')
    								->get();

    	$products=\App\Product::where('name', 'like', '%'.$content.'%')
    								->get()
    								->toArray();
    	foreach ($tags as $tag) {
    		$tag_products=$tag->products->toArray();
    		$products=array_merge($products, $tag_products);
    	}
    	foreach ($categories as $category) {
    		$category_products=$category->products->toArray();
    		$products=array_merge($products, $category_products);
    	}
    	$products=array_unique($products,SORT_REGULAR);
    	$ids=array();
    	foreach($products as $product){
    		array_push($ids, $product['id']);
    	}
    	$data['products']=\App\Product::whereIn('id', $ids)->get();
    	return view('product/index', $data);
    }
}
