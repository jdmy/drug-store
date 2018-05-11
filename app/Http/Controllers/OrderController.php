<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function index(Request $request)
	{
		$data['orders']=\App\Order::find($request->user()->id)->orders;
	    return view('order/index',$data);
	}

    public function create(Request $request)
    {
    	$data['order_items']=\App\User::find($request->user()->id)->order_items;
        return view('order/create', $data);
    }

    public function store(Request $request)
	{
		$order=new \App\Order;

	    $order->address = $request->get('address');
	    $order->receiver = $request->get('receiver');
	    $order->mobile = $request->get('mobile');
	    $order->userMessage = $request->get('userMessage');
	    $order->orderCode = date('YmdHis').$request->user()->id;
	    $order->createDate = date('Y-m-d H:i:s');

	    if ($order->save()) {
	        return redirect('/');
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}
}
