@extends('layouts.master')
@section('content')
    @foreach ($products->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $product)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text h-50">{{ $product->description }}</p>
                            <a href="{{ route('products.addToCart', $product->id) }}" class="btn btn-info btn-block"><i
                                    class="fa fa-cart-plus"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <br>
    @endforeach
@endsection
