@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">标签管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <a href="{{ url('admin/tags/create') }}" class="btn btn-lg btn-primary">新增标签</a>

                    @foreach ($tags as $tag)
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ $tag->name }}(id:{{$tag->id}})</div>
                        <div class="panel-body">
                            <label>标签名称:</label>{{ $tag->name }}<br>
                            <form action="{{ url('admin/tags/'.$tag->id) }}" method="POST" style="display: inline;">
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