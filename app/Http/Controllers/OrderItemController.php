<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Request $request)
	{
		$data['order_items']=\App\User::find($request->user()->id)->order_items;
	    return view('order_item/index',$data);
	}

	public function store(Request $request)
	{
		$order_items=\App\User::find($request->user()->id)->order_items;
		$order_item="";
		foreach ($order_items as $o_item) {
			if($o_item->pid == $request->get('pid')){
				$order_item=$o_item;
			}
		}
		if($order_item==""){
		    $order_item = new \App\OrderItem;
		    $order_item->number = $request->get('number');
		    $order_item->pid = $request->get('pid');
		    $order_item->uid = $request->user()->id;
	    }
	    else{
	    	$order_item->number+=$request->get('number');
	    }
	    if ($order_item->save()) {
	        return redirect('order_items');
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

	public function destroy($id)
    {
        \App\OrderItem::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
