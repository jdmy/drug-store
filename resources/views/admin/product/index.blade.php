@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">药品管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <a href="{{ url('admin/products/create') }}" class="btn btn-lg btn-primary">新增药品</a>

                    @foreach ($products as $product)
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ $product->name }}(id:{{$product->id}})</div>
                        <div class="panel-body">
                            <label>药品名称:</label>{{ $product->name }}<br>
                            <label>价格:</label>{{ $product->price }}<br>
                            <label>库存:</label>{{ $product->stock }}<br>
                            <label>规格:</label>{{ $product->spec }}<br>
                            <label>成分:</label>{{ $product->component }}<br>
                            <label>用法用量:</label>{{ $product->dosage }}<br>
                            <label>功能主治:</label>{{ $product->function }}<br>
                            <label>不良反应:</label>{{ $product->adverse_reaction }}<br>
                            <label>禁忌:</label>{{ $product->taboo }}<br>
                            <label>注意事项:</label>{{ $product->attention }}<br>
                            <label>批准文号:</label>{{ $product->approval_number }}<br>
                            <label>生产企业:</label>{{ $product->enterprise }}<br>
                            <label>是否为非处方药</label>{{ $product->is_otc }}<br>
                            <label>种类:</label>{{ $product->category->name }}<br>
                            <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/products/'.$product->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection