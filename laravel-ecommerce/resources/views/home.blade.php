@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row">

            <div class="col-md-8">
                <div class="card">
                    <b>
                        <h3 class="card-header">New Arrival</h3>
                    </b>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-8 mb-4 shadow-sm">
                                    <div class="card" style="width: 18rem,height:100%">
                                        <div class="card-img-top">
                                            <img class="card-img-top" src="{{ asset($product->picture) }}">
                                        </div>
                                        <div class="card-body">
                                            <b>
                                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                                </>
                                                <p class="d-flex flex-row justify-content-between align-items-center">

                                                    <b><span class="text-muted">{{ $product->price }} DH</span></b>

                                                    <strike>
                                                        <b> <span class="text-danger">{{ $product->old_price }}
                                                                DH</span></b>
                                                    </strike>
                                                </p>
                                                <p class="card-text">
                                                    {{ Str::limit($product->description, 100) }}
                                                </p>
                                                <a href="{{ route('show', $product->product_id) }}"
                                                    class="btn btn-success"><i class="fas fa-eye"></i></a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="justify-content-center d-flex">

                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex p-2">
                <div class="list-group">
                    <li class="list-group-item active">categories</li>
                    @foreach ($categories as $category)
                        <a class="list-group-item" href="{{ route('Categories', $category->category_id) }}">
                            {{ $category->category_name }}
                            ({{ $category->products->count() }})
                        </a>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
@endsection
