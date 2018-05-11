@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php $total=0; ?>
            <table class="table table-bordered">
              <tr>
                <th>药品名</th>
                <th>单价</th>
                <th>数量</th>
                <th>金额</th>
                <th>操作</th>
              </tr>
            @foreach ($order_items as $order_item)
                <tr>
                    <td>{{$order_item->product->name}}</td>
                    <td>{{$order_item->product->price}}</td>
                    <td>{{$order_item->number}}</td>
                    <td>{{$order_item->number*$order_item->product->price}}</td>
                    <td>
                        <form action="{{ url('order_items/'.$order_item->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
                <?php $total+=$order_item->number*$order_item->product->price; ?>
            @endforeach
            </table>
            <lable>总金额:{{ $total }}</lable><br>

        </div>
        
    </div>
</div>
@endsection