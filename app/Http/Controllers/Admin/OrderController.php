<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
	{
		$data['orders']=\App\Order::simplePaginate(10);
	    return view('admin/order/index',$data);
	}

	public function delivery(Request $request, $id)
    {
        $order=\App\Order::find($request->get('oid'));
        $order->deliveryDate=date('Y-m-d H:i:s');
		$order->status='waitConfirm';
        if ($order->save()) {
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }
}
