
@extends('layouts.app')

@section('content')
	<h1>支付页面</h1>
	<form action="{{ url('pay') }}" method="POST">
	    {{ csrf_field() }}
	    <h2>需要支付{{ $total }}</h2>
	    <input type="text" name="oid" hidden="true" value="{{ $order->id }}">
	    <button type="submit" class="btn btn-danger">支付</button>
	</form>
@endsection