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

                    
                    <form action="{{ url('admin/product_images/'.$product->id) }}" method="post" enctype="multipart/form-data" >    
                        {{csrf_field()}}
                        <input type="file" name="picture">
                        <button type="submit"> 提交 </button>
                    </form>
                    @foreach ($product_images as $product_image)
                        <div class="panel panel-default">
                        <div class="panel-heading">{{ $product_image->url }}</div>
                        <div class="panel-body">
                            <label>药品名称:</label>{{ $product_image->url }}<br>
                            <img src="{{ URL::asset('storage/images/products/'.$product_image->url) }}" id="img"/>
                            <form action="{{ url('admin/product_images/'.$product->id.'/'.$product_image->id) }}" method="POST" style="display: inline;">
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