@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">药店管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <a href="{{ url('admin/stores/create') }}" class="btn btn-lg btn-primary">新增药店</a>

                    @foreach ($stores as $store)
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ $store->name }}</div>
                        <div class="panel-body">
                            <label>店铺名称:</label>{{ $store->name }}<br>
                            <label>联系电话:</label>{{ $store->phone }}<br>
                            <label>地址:</label>{{ $store->address }}<br>
                            <a href="{{ url('admin/stores/'.$store->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/stores/'.$store->id) }}" method="POST" style="display: inline;">
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