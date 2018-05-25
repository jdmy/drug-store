<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function search(Request $request)
    {
    	$content=$request->get('content');
        $request->session()->put('last_content', $content);
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
    	$data['products']=\App\Product::whereIn('id', $ids)->simplePaginate(3);
        $data['last_search']=$content;
        $data['ids']=$ids;
    	return view('product/index', $data);
    }
    public function search_get(Request $request)
    {
        $content=$request->session()->get('last_content',"abcdefg");
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
        $data['products']=\App\Product::whereIn('id', $ids)->simplePaginate(3);
        $data['last_search']=$content;
        $data['ids']=$ids;
        return view('product/index', $data);
    }
}
