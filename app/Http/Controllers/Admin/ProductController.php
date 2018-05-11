<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
	{
		$data['products']=\App\Product::all();
	    return view('admin/product/index',$data);
	}

	public function create()
	{
	    return view('admin/product/create')->with('categories', \App\Category::all());
	}

	public function edit($id)
    {
    	$data['product']=\App\Product::find($id);
		$data['categories']=\App\Category::all();
        return view('admin/product/edit', $data);
    }

	public function store(Request $request)
	{
	    $product = new \App\Product;
	    $product->name = $request->get('name');
	    $product->price = $request->get('price');
	    $product->stock = $request->get('stock');
	    $product->spec = $request->get('spec');
	    $product->component = $request->get('component');
	    $product->dosage = $request->get('dosage');
	    $product->function = $request->get('function');
	    $product->adverse_reaction = $request->get('adverse_reaction');
	    $product->taboo = $request->get('taboo');
	    $product->attention = $request->get('attention');
	    $product->approval_number = $request->get('approval_number');
	    $product->enterprise = $request->get('enterprise');
	    $product->is_otc = $request->get('is_otc');
	    $product->cid = $request->get('cid');
	    if ($product->save()) {
	        return redirect('admin/products');
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

	public function update(Request $request, $id)
    {
        $product = \App\Product::find($id);
        $product->name = $request->get('name');
	    $product->price = $request->get('price');
	    $product->stock = $request->get('stock');
	    $product->component = $request->get('component');
	    $product->dosage = $request->get('dosage');
	    $product->function = $request->get('function');
	    $product->adverse_reaction = $request->get('adverse_reaction');
	    $product->taboo = $request->get('taboo');
	    $product->attention = $request->get('attention');
	    $product->approval_number = $request->get('approval_number');
	    $product->enterprise = $request->get('enterprise');
	    $product->is_otc = $request->get('is_otc');
	    $product->cid = $request->get('cid');
        if ($product->save()) {
            return redirect('admin/products');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }
    public function destroy($id)
    {
        \App\Product::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
