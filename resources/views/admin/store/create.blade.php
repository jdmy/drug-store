@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一个药店</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/stores') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入店铺名称"></input>
                        <br>
                        <input type="text" name="phone" class="form-control" required="required" placeholder="请输入联系电话"></input>
                        <br>
                        <input type="text" name="address" class="form-control" required="required" placeholder="请输入地址"></input>
                        <br>
                        <label>省份</label>
                        <select name="provinceid" onclick="test()" id="province">
                            @foreach ($provinces as $province)
                              <option value ="{{ $province->provinceid }}">{{ $province->province }}</option>
                            @endforeach
                        </select>
                        <label>城市</label>
                        <select name="cityid" id="city">
                            
                        </select>
                        <br>
                        <button class="btn btn-lg btn-info">新增药店</button>
                    </form>
                    <script type="text/javascript">
                        $("#province").change(function(e){
                            $.ajax({
                                type:'get',
                                dataType:"text",
                                url: 'ajax/cities/'+e.target.value,
                                success: function(data){
                                    $('#city').html(data);
                                    console.log(data)
                                }
                                });
                            })
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection