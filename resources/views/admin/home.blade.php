@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ url('/admin/products') }}" class="btn btn-lg btn-info">管理药品</a>
                    <a href="{{ url('/admin/users') }}" class="btn btn-lg btn-info">管理用户</a>
                    <a href="{{ url('/admin/stores') }}" class="btn btn-lg btn-info">管理药店地址</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection