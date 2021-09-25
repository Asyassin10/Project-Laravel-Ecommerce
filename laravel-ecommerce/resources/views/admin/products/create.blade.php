@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include("layouts.sidebar")
            </div>
            <div class="col-md-8">
                <div class="card p-3">
                    <h3 class="card-title">Add new product</h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="product_name" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="description" placeholder="Description" cols="30" rows="10"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" name="price" placeholder="Price" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="number" name="old_price" placeholder="Old Price" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="number" name="in_stock" placeholder="In Stock" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="picture" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="categories_id" class="form-control">
                                    <option value="" selected disabled>
                                        Choose a category
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
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
