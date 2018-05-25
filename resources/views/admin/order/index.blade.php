@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">订单管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <table class="table table-bordered">
                      <tr>
                        <th>ID</th>
                        <th>订单号</th>
                        <th>订单状态</th>
                        <th>金额</th>
                        <th>创建日期</th>
                        <th>支付日期</th>
                        <th>发货日期</th>
                        <th>确认收获日期</th>
                        <th>操作</th>
                      </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->orderCode}}</td>
                            <td>{{$order->status}}</td>
                            <?php 
                            $total=0;
                            foreach($order->order_items as $order_item){
                            	$total+=$order_item->number*$order_item->product->price;
                            }
                            ?>
                            <td>{{$total}}</td>
                            <td>{{$order->createDate}}</td>
                            <td>{{$order->payDate}}</td>
                            <td>{{$order->deliveryDate}}</td>
                            <td>{{$order->confirmDate}}</td>
                            <td>
                            	@if($order->status =='waitDelivery')
                            	<form action="{{ url('admin/orders/delivery/'.$order->id) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                <input type="text" name="oid" hidden="true" value="{{ $order->id }}">
                                <button type="submit" class="btn btn-danger">发货</button>
                                @endif
                            </form></td>
                            
                        </tr>
                    @endforeach

                    </table>
                    {{ $orders->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection