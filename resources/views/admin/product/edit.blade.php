@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑药品</div>
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <label>药品名称</label>
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入药品名称" value="{{ $product->name }}">
                        <br>
                        <label>价格</label>
                        <input type="text" name="price" onkeyup= "if( ! /^\d*(?:\.\d{0,2})?$/.test(this.value)){alert('只能输入数字，小数点后只能保留两位');this.value='';}" class="form-control" required="required" placeholder="请输入价格" value="{{ $product->price }}"></input>
                        <br>
                        <label>库存</label>
                        <input type="text" name="stock" onkeyup= "if(! /^\d+$/.test(this.value)){alert('只能整数');this.value='';}" class="form-control" required="required" placeholder="请输入库存" value="{{ $product->stock }}"></input>
                        <br>
                        <label>规格</label>
                        <input type="text" name="spec" class="form-control" required="required" placeholder="请输入规格" value="{{ $product->spec }}"></input>
                        <br>
                        <label>成分</label>
                        <input type="text" name="component" class="form-control" required="required" placeholder="请输入成分" value="{{ $product->component }}"></input>
                        <br>
                        <label>用法用量</label>
                        <input type="text" name="dosage" class="form-control" required="required" placeholder="请输入用法用量" value="{{ $product->dosage }}"></input>
                        <br>
                        <label>功能主治</label>
                        <input type="text" name="function" class="form-control" required="required" placeholder="请输入功能主治" value="{{ $product->function }}"></input>
                        <br>
                        <label>不良反应</label>
                        <input type="text" name="adverse_reaction" class="form-control" required="required" placeholder="请输入不良反应" value="{{ $product->adverse_reaction }}"></input>
                        <br>
                        <label>禁忌</label>
                        <input type="text" name="taboo" class="form-control" required="required" placeholder="请输入禁忌" value="{{ $product->taboo }}"></input>
                        <br>
                        <label>注意事项</label>
                        <input type="text" name="attention" class="form-control" required="required" placeholder="请输入注意事项" value="{{ $product->attention }}"></input>
                        <br>
                        <label>批准文号</label>
                        <input type="text" name="approval_number" class="form-control" required="required" placeholder="请输入批准文号" value="{{ $product->approval_number }}"></input>
                        <br>
                        <label>生产企业</label>
                        <input type="text" name="enterprise" class="form-control" required="required" placeholder="请输入生产企业" value="{{ $product->enterprise }}"></input>
                        <br>
                        <label>是否为非处方药</label>
                        <input type="radio" name="is_otc" required="required" value="1" 
                                @if ($product->is_otc == 1 ) 
                                    checked = "checked"
                                @endif
                                >是</input>
                        <input type="radio" name="is_otc" required="required" value="0"
                                @if ($product->is_otc == 0 ) 
                                    checked = "checked"
                                @endif
                                >否</input>
                        <br>
                        <label>种类</label>
                        <select name="cid">
                            @foreach ($categories as $category)
                              <option value ="{{ $category->id }}" 
                                @if ($product->cid == $category->id ) 
                                    selected = "selected"
                                @endif
                                    >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-lg btn-info">提交修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection