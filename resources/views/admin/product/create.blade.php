@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一个药品</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/products') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入药品名称" >
                        <br>
                        <input type="text" name="price" onkeyup= "if( ! /^\d*(?:\.\d{0,2})?$/.test(this.value)){alert('只能输入数字，小数点后只能保留两位');this.value='';}" class="form-control" required="required" placeholder="请输入价格"></input>
                        <br>
                        <input type="text" name="stock" onkeyup= "if(! /^\d+$/.test(this.value)){alert('只能整数');this.value='';}" class="form-control" required="required" placeholder="请输入库存"></input>
                        <br>
                        <input type="text" name="spec" class="form-control" required="required" placeholder="请输入规格"></input>
                        <br>
                        <input type="text" name="component" class="form-control" required="required" placeholder="请输入成分"></input>
                        <br>
                        <input type="text" name="dosage" class="form-control" required="required" placeholder="请输入用法用量"></input>
                        <br>
                        <input type="text" name="function" class="form-control" required="required" placeholder="请输入功能主治"></input>
                        <br>
                        <input type="text" name="adverse_reaction" class="form-control" required="required" placeholder="请输入不良反应"></input>
                        <br>
                        <input type="text" name="taboo" class="form-control" required="required" placeholder="请输入禁忌"></input>
                        <br>
                        <input type="text" name="attention" class="form-control" required="required" placeholder="请输入注意事项"></input>
                        <br>
                        <input type="text" name="approval_number" class="form-control" required="required" placeholder="请输入批准文号"></input>
                        <br>
                        <input type="text" name="enterprise" class="form-control" required="required" placeholder="请输入生产企业"></input>
                        <br>
                        <label>是否为非处方药</label>
                        <input type="radio" name="is_otc" required="required" value="1">是</input>
                        <input type="radio" name="is_otc" required="required" value="0">否</input>
                        <br>
                        <label>种类</label>
                        <select name="cid">
                            @foreach ($categories as $category)
                              <option value ="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-lg btn-info">新增药品</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection