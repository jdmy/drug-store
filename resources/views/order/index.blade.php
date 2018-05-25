@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php $total=0; ?>
            <table class="table table-bordered">
              <tr>
                <th>订单id</th>
                <th>订单号</th>
                <th>地址</th>
                <th>金额</th>
                <th>收件人</th>
                <th>电话</th>
                <th>操作</th>
              </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->orderCode}}</td>
                    <td>{{$order->address}}</td>
                    <td>
                        <?php
                            $total=0;
                            foreach ($order->order_items as $order_item) {
                                $total+=$order_item->number*($order_item->product->price);
                            }
                            echo $total;
                        ?>
                    </td>
                    <td>{{$order->receiver}}</td>
                    <td>{{$order->mobile}}</td>
                    <td>
                        @if($order->status=='waitPay')
                            <a href="{{ url('pay/'.$order->id) }}" class="btn btn-danger">去支付</a>
                        @elseif($order->status=='waitDelivery')
                        待发货
                        @elseif($order->status=='waitConfirm')
                            <a href="{{ url('confirm/'.$order->id) }}" class="btn btn-danger">确认收货</a>
                        @elseif($order->status=='finish')
                        已收货
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>
            {{ $orders->links() }}

        </div>
        
    </div>
</div>
@endsection