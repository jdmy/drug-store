@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <input type="radio" name="is_otc" value="1" class="otc">非处方药</input>
        <input type="radio" name="is_otc" value="0" class="otc">处方药</input>
    </div>
    

    <script type="text/javascript">
        $(".otc").change(function(e){
            if(e.target.value=='1'){
                var div1s=document.querySelectorAll("[data-isotc='0']");
                for(var i=0,j=div1s.length;i<j;i++){
                    div1s[i].style.display="none";
                }
                var div2s=document.querySelectorAll("[data-isotc='1']");
                for(var i=0,j=div2s.length;i<j;i++){
                    div2s[i].style.display="";
                }
            }
            else{
                var div1s=document.querySelectorAll("[data-isotc='1']");
                for(var i=0,j=div1s.length;i<j;i++){
                    div1s[i].style.display="none";
                }
                var div2s=document.querySelectorAll("[data-isotc='0']");
                for(var i=0,j=div2s.length;i<j;i++){
                    div2s[i].style.display="";
                }
            }
        })
    </script>
</div>
<div class="container">
    <div class="row">
        <!-- <pre>
            <?php 
            if(isset($ids))
            echo var_dump($ids)
            ?>
        </pre> -->
        @foreach ($products as $product)
            <div class="col-md-3 text-center" data-isotc="{{ $product->is_otc }}">
                <a href="{{ url('products/'.$product->id) }}">
                    <label>{{ $product->name }}</label><br>
                    <label>¥{{ $product->price }}</label>

                    
                    <img class="img-responsive center-block" src="{{ URL::asset('storage/images/products/'.(count($product->product_images)==0?'':$product->product_images[0]->url)) }}" />
                </a>
            </div>
        @endforeach

    </div>
    {{ $products->links() }}
</div>

@endsection