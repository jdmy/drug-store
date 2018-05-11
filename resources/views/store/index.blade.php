@extends('layouts.app')

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

                    <table class="table table-bordered">
                      <tr>
                        <th>店铺名称</th>
                        <th>联系电话</th>
                        <th>地址</th>
                      </tr>
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{$store->name}}</td>
                            <td>{{$store->phone}}</td>
                            <td>{{ $store->city->province->province.$store->city->city.$store->address}}</td>
                        </tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection