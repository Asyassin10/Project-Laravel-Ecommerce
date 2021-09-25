@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-row">

            <div class="col-md-12 card p-3">
                <h4 class='text-dark'>Your basket</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>pic</th>
                            <th>name</th>
                            <th>Quantity</th>
                            <th>price</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset($item->options->image) }}" alt="" width="70" height="70"
                                        class="img-fluid rounded">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST"
                                        class="d-flex flex-row justify-content-center align-items-center">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <input type="number" name="qty" id="qty" value="{{ $item->qty }}"
                                                placeholder="quantity" max="{{ $item->options->in_stock }}" min="1"
                                                class=" form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                </td>
                                <td>{{ $item->price }}
                                </td>
                                <td>{{ $item->subtotal }} DH</td>

                                <td>
                                    <form action="{{ route('cart.remove', $item->rowId) }}" method="POST"
                                        class="d-flex flex-row justify-content-center align-items-center">
                                        @csrf
                                        @method('DELETE')
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        <tr class="text-dark font-weight-bold">
                            <td class="border border-success" colspan="3">Total</td>
                            <td class="border border-success" colspan="1">{{ Cart::subtotal() }} DH</td>

                        </tr>
                    </tbody>
                </table>
                @if (Cart::subtotal() > 0)
                    <div class="form-group">
                        <a href="{{ route('make.payment') }}" class="btn btn-primary mt-3">to
                            pay {{ Cart::subtotal() }}DH via PayPal</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
