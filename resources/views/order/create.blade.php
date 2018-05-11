@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">输入订单信息</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('orders') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="address" class="form-control" required="required" placeholder="请输入详细地址">
                        <br>
                        <input type="text" name="receiver" class="form-control" required="required" placeholder="请输入收货人姓名">
                        <br>
                        <input type="text" name="mobile" class="form-control" required="required" placeholder="请输入手机号码">
                        <br>
                        <input type="text" name="userMessage" class="form-control" required="required" placeholder="请输入留言">
                        <br>
                        <button class="btn btn-lg btn-info">提交订单</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php $total=0; ?>
            <table class="table table-bordered">
              <tr>
                <th>药品名</th>
                <th>单价</th>
                <th>数量</th>
                <th>金额</th>
              </tr>
            @foreach ($order_items as $order_item)
                <tr>
                    <td>{{$order_item->product->name}}</td>
                    <td>{{$order_item->product->price}}</td>
                    <td>{{$order_item->number}}</td>
                    <td>{{$order_item->number*$order_item->product->price}}</td>
                </tr>
                <?php $total+=$order_item->number*$order_item->product->price; ?>
            @endforeach
            </table>
            <lable>总金额:{{ $total }}</lable><br>
            
        </div>
        
    </div>
</div>
@endsection