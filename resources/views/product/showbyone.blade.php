@extends('layouts.app')

@section('content')
<style>
        .carousel-item img{
            max-width: 100%;
            height:auto;
        }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <!-- <img class="img-responsive center-block" src="{{ URL::asset('storage/images/products/'.(count($product->product_images)==0?'':$product->product_images[0]->url)) }}" /> -->
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    @for($i=0;$i<count($product->product_images);$i++)
                        <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active"></li>
                    @endfor
                </ol>   
                <div class="carousel-inner">
                    <?php $is_init=0; ?>
                    @foreach($product->product_images as $product_image)
                        <div class="item carousel-item
                        @if($is_init==0)
                        active
                        <?php $is_init=1; ?>
                        @endif
                        ">
                            <img class="img-responsive center-block" src="{{ URL::asset('storage/images/products/'.$product_image->url) }}" alt="First slide">
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-7">
            <label>药品名称:</label>{{ $product->name }}<br>
            <label>价格:</label>{{ $product->price }}<br>
            <label>库存:</label>{{ $product->stock }}<br>
            <label>规格:</label>{{ $product->spec }}<br>
            <label>成分:</label>{{ $product->component }}<br>
            <label>用法用量:</label>{{ $product->dosage }}<br>
            <label>功能主治:</label>{{ $product->function }}<br>
            <label>不良反应:</label>{{ $product->adverse_reaction }}<br>
            <label>禁忌:</label>{{ $product->taboo }}<br>
            <label>注意事项:</label>{{ $product->attention }}<br>
            <label>批准文号:</label>{{ $product->approval_number }}<br>
            <label>生产企业:</label>{{ $product->enterprise }}<br>
            <label>是否为非处方药</label>{{ $product->is_otc }}<br>
            <label>种类:</label>{{ $product->category->name }}<br>
            <form action="{{url('order_items')}}" method="POST">
                {{ csrf_field() }}
                <input type="number" name="number">
                <input type="text" name="pid" value="{{ $product->id }}" hidden="true">
                <button>立即购买</button>
            </form>
        </div>
    </div>
</div>
@endsection