@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">药品标签管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <form action="{{ url('admin/product_tag/'.$product->id) }}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        <label>标签:</label>
                        <select name="tid">
                            @foreach ($total_tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger">新增</button>
                    </form>
                    @foreach ($tags as $tag)
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ $tag->name }}</div>
                        <div class="panel-body">
                            <label>名称:</label>{{ $tag->name }}<br>
                            
                            <form action="{{ url('admin/product_tag/'.$product->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="text" name="tid" value="{{ $tag->id }}" hidden="true">
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