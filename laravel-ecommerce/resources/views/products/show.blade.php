@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row">

            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">{{ $data->product_name }}</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-11 mb-4 shadow-sm">
                                <div class="card" style="width: 18rem,height:100%">
                                    <div class="card-img-top">
                                        <img class="card-img-top" src="{{ asset($data->picture) }}"
                                            alt="{{ $data->product_name }}">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->product_name }}</h5>
                                        <p class=" text-dark font-weight-bold">{{ $data->category_name }}</p>
                                        <p class="d-flex flex-row justify-content-between align-items-center">

                                            <b><span class="text-muted">{{ $data->price }} DH</span></b>
                                            <strike>
                                                <b> <span class="text-danger">{{ $data->old_price }}
                                                        DH</span></b>
                                            </strike>
                                        </p>
                                        <p class="card-text">
                                            {{ $data->description }}
                                        </p>
                                        <p class=" font-weight-bold">
                                            @if ($data->in_stock > 0)
                                                <span class=" text-success">available</span>
                                            @else
                                                <span class=" text-danger">Unvailable</span>

                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-lg-4">
                @auth
                    <form action="{{ route('cart.add', $data->product_id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="qty" class="label-input">
                                Quantity :
                            </label>
                            <input type="number" name="qty" id="qty" value="1" placeholder="quantity"
                                max="{{ $data->in_stock }}" min="1" class=" form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block bg-dark text-white">
                                <i class="fa fa-shopping-cart">
                                    Add to Cart
                                </i>
                            </button>
                        </div>
                    </form>
                @else
                    <div class=" form-group">
                        <label for="qty" class="label-input">
                            Quantity :
                        </label>
                        <input type="number" name="qty" id="qty" value="1" placeholder="quantity" max="{{ $data->in_stock }}"
                            min="1" class=" form-control">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('login') }}" class="btn btn-block bg-dark text-white">
                            <i class="fa fa-shopping-cart">
                                Add to Cart
                            </i>
                        </a>
                    </div>
                @endauth


            </div>
        </div>
    </div>
@endsection
