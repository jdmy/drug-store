<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function index(Request $request)
	{
		$data['orders']=\App\Order::where('uid', $request->user()->id)
						->get();
	    return view('order/index',$data);
	}

    public function create(Request $request)
    {
    	$data['order_items']=\App\OrderItem::where('uid', $request->user()->id)
	    					->where('oid', null)
	    					->get();
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
	    $order->uid = $request->user()->id;


	    if ($order->save()) {
	    	\App\OrderItem::where('uid', $request->user()->id)
	    					->where('oid', null)
	    					->update(['oid' => $order->id]);
	    	$data['total']=$request->get('total');
	    	$data['order']=$order;
	        return view('pay/index', $data);
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

	public function pay(Request $request)
	{
		$order=\App\Order::find($request->get('oid'));
		$order->payDate=date('Y-m-d H:i:s');
		if ($order->save()) {
	        return view('pay/done');
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}
}
