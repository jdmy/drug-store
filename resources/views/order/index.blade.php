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
                
                <th>收件人</th>
                <th>电话</th>
                <th>操作</th>
              </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->orderCode}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->receiver}}</td>
                    <td>{{$order->mobile}}</td>
                    <td>
                        @if($order->payDate==null)
                            <button type="submit" class="btn btn-danger">去支付</button>
                        @else
                        已支付
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>

        </div>
        
    </div>
</div>
@endsection