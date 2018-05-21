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
                    <select name="provinceid" id="province">
                        @foreach ($provinces as $province)
                          <option value ="{{ $province->provinceid }}">{{ $province->province }}</option>
                        @endforeach
                    </select>
                    <label>城市</label>
                    <select name="cityid" id="city">

                    </select>
                    <script type="text/javascript">
                        $("#province").change(function(e){
                            $.ajax({
                                type:'get',
                                dataType:"text",
                                url: 'stores/ajax/cities/'+e.target.value,
                                success: function(data){
                                    $('#city').html(data);
                                    console.log(data)
                                }
                            });
                        })
                        $("#city").blur(function(e){
                            var div1s=document.querySelectorAll('[data-city]');
                            for(var i=0,j=div1s.length;i<j;i++){
                                div1s[i].style.display="none";
                            }
                            var div2s=document.querySelectorAll("[data-city='"+e.target.value+"']");
                            for(var i=0,j=div2s.length;i<j;i++){
                                div2s[i].style.display="";
                            }
                        })
                    </script>


                    
                    <table class="table table-bordered">
                      <tr>
                        <th>店铺名称</th>
                        <th>联系电话</th>
                        <th>地址</th>
                        <th>编辑</th>
                        <th>删除</th>
                      </tr>
                    @foreach ($stores as $store)
                        <tr data-province="{{ $store->city->province->provinceid }}" data-city="{{ $store->city->cityid }}">
                            <td>{{$store->name}}</td>
                            <td>{{$store->phone}}</td>
                            <td>{{ $store->city->province->province.$store->city->city.$store->address}}</td>
                            <td><a href="{{ url('admin/stores/'.$store->id.'/edit') }}" class="btn btn-success">编辑</a></td>
                            <td><form action="{{ url('admin/stores/'.$store->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form></td>
                        </tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection