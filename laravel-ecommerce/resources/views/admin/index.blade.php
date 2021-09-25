@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-4">
                <a href="{{ route('admin.products') }}">
                    <div class="card bg-danger text-white">
                        <div class="card-body d-flex flex-column jutify-content-center align-items-center">
                            <h3>Products</h3>
                            <span class="font-weight-bold"> {{ $product->count() }}</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.order') }}">
                    <div class="card bg-primary text-white">
                        <div class="card-body d-flex flex-column jutify-content-center align-items-center">
                            <h3>Orders</h3>
                            <span class="font-weight-bold"> {{ $order->count() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection
