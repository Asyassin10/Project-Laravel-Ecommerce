@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include("layouts.sidebar")
            </div>
            <div class="col-md-8">
                <div class="card p-3">
                    <h3 class="card-title">Update {{ $product->product_name }}</h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.update', $product->product_id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <span class="badge badge-info text-dark">Name Product :</span>
                                <input type="text" name="product_name" placeholder="Titre"
                                    value="{{ $product->product_name }}" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="badge badge-info text-dark">Details :</span>
                                <textarea name="description" placeholder="Description" cols="30" rows="10"
                                    class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="badge badge-info text-dark">Price :</span>
                                <input type="number" name="price" placeholder="Prix" value="{{ $product->price }}"
                                    class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="badge badge-info text-dark">Old Price :</span>
                                <input type="number" name="old_price" placeholder="Prix Ancien"
                                    value="{{ $product->old_price }}" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="badge badge-info text-dark">Stock :</span>
                                <input type="number" name="in_stock" placeholder="Quantité en stock"
                                    value="{{ $product->in_stock }}" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="badge badge-info text-dark">Picture :</span>
                                <img src="{{ asset($product->picture) }}" width="200" height="200"
                                    alt="{{ $product->product_name }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="file" name="picture" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="badge badge-info text-dark">categories :</span>
                                <select name="categories_id" class="form-control">
                                    <option value="" selected disabled>
                                        Choisir une catégorie
                                    </option>
                                    @foreach ($categories as $category)
                                        <option {{ $product->categories_id === $category->category_id ? 'selected' : '' }}
                                            value="{{ $category->category_id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
