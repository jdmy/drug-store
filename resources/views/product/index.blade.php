@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 text-center">
                <a href="{{ url('products/'.$product->id) }}">
                    <label>{{ $product->name }}</label><br>
                    <label>¥{{ $product->price }}</label>
                    <img class="img-responsive center-block" src="{{ URL::asset('storage/images/products/'.$product->product_images[0]->url) }}" />
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection