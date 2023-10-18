@extends('layouts.apps')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p class="mt-3">Name: <b>{{ $product->name }}</b></p>
            <p class="mt-3">Description: <b>{{ $product->description }}</b></p>
            <img src="/products/{{ $product->image }}" class="rounded mt-3" width="100%" >
        </div>
    </div>
</div>
@endsection