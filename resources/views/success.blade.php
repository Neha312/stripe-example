@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header bg-success text-white">
                    <i class="fa fa-check"></i> Success
                </div>
                <div class="card-body">
                    Your order has been placed successfully. <a href="{{ route('products') }}"><i class="fa fa-plus"></i> Go
                        to products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
