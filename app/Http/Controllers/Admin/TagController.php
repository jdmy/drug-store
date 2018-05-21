<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
	{
		$data['tags']=\App\Tag::all();
	    return view('admin/tag/index',$data);
	}

	public function create()
	{
	    return view('admin/tag/create');
	}

	public function store(Request $request)
	{
	    $tag = new \App\Tag;
	    $tag->name = $request->get('name');
	    
	    if ($tag->save()) {
	        return redirect('admin/tags');
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

	public function destroy($id)
    {
        \App\Tag::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

    public function product_tag_store(Request $request, $id)
	{
		$product =  \App\Product::find($id);
		$tid = $request->get('tid');
	    
	    
	    if (!$product->tags()->attach($tid)) {
	        return redirect('admin/product_tag/'.$product->id);
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

    public function product_tag_edit($id)
    {
    	$product=\App\Product::find($id);
    	$tags =  \App\Product::find($id)->tags;
    	$data['product']=$product;
    	$data['tags']=$tags;
    	$data['total_tags']=\App\Tag::all();
    	return view('admin/tag/product_tag_edit', $data);
    }

    public function product_tag_destroy(Request $request, $id)
    {
        $product=\App\Product::find($id);
        $tid=$request->get('tid');
        $product->tags()->detach($tid);
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

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
    	$data['products']=\App\Product::whereIn('id', $ids)->simplePaginate(3);

    	return view('admin/product/index', $data);
    }


}
