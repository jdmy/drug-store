@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">用户管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    @foreach ($users as $user)
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ $user->name }}</div>
                        <div class="panel-body">
                            <label>名称:</label>{{ $user->name }}<br>
                            <label>Email:</label>{{ $user->email }}<br>
                            
                            <form action="{{ url('admin/users/'.$user->id) }}" method="POST" style="display: inline;">
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