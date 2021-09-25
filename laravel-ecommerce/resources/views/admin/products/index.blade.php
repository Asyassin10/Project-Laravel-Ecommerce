@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-8">

                <a href="{{ route('products.create') }}" class="btn btn-primary my-2">
                    <i class="fa fa-plus"> Add Product</i>
                </a>
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Picture</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Old price</th>
                            <th>category</th>
                            <th>description</th>

                            <th>Available</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>

                                <td>{{ $product->product_id }}</td>
                                <td><img src="{{  asset($product->picture)  }}" alt="" width="60" height="60"
                                        class="img-fluid rounded"></td>
                                <td> {{ $product->product_name }}</td>
                                <td> {{ $product->in_stock }}</td>

                                <td>{{ $product->price }} DH</td>
                                <td>{{ $product->old_price }} DH</td>
                                <td>
                                    {{ $product->category->category_name }}
                                </td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>

                                    @if ($product->in_stock > 1)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif

                                </td>

                                <td class="d-flex flex-row justify-content-center align-items-center">
                                    <a href="{{ route('products.edit', $product->product_id) }}"
                                        class="btn btn-sm btn-warning mr-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form id="{{ $product->product_id }}" method="POST"
                                        action="{{ route('products.delete', $product->product_id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="event.preventDefault();
                                                                if(confirm('Do you really want to delete {{ $product->product_name }} ?'))
                                                              document.getElementById({{ $product->product_id }}).submit();
                                                               " class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="justify-content-center d-flex">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
