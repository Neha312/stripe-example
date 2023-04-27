@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header bg-warning">
                    <i class="fa fa-exclamation-circle"></i> Cancelled
                </div>
                <div class="card-body">
                    You have cancelled your checkout. <a href="{{ route('products') }}"><i class="fa fa-plus"></i> add new
                        products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
