@extends('layouts.main')

@section('title','Home')
@section('custom_css')


@endsection

@section('custom_js')


@endsection


@section('content')

<!-- product tab start -->
<section class="whish-list-section theme1 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title mb-30 pb-25 text-capitalize">Your cart items</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col">Product Image</th>
                            <th class="text-center" scope="col">Product Name</th>
                            <th class="text-center" scope="col">Stock Status</th>
                            <th class="text-center" scope="col">Qty</th>
                            <th class="text-center" scope="col">Price</th>
                            <th class="text-center" scope="col">action</th>
                            <th class="text-center" scope="col">Checkout</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_items as $product)
                        <tr>
                            <th class="text-center" scope="row">
                                <img style="height:100px" src="/assets/img/products/{{ @$product[0]->images[0]['img'] }}" alt="img">
                            </th>
                            <td class="text-center">
                                <span class="whish-title">{{$product[0]->title}}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-danger position-static">In Stock</span>
                            </td>
                            <td class="text-center">
                                <div class="product-count style">
                                    <div class="count d-flex justify-content-center">
                                        <input type="number" min="1" max="10" step="1" value="{{ $product[1] }}">
                                        <div class="button-group">
                                            <button class="count-btn increment"><i
                                                    class="fas fa-chevron-up"></i></button>
                                            <button class="count-btn decrement"><i
                                                    class="fas fa-chevron-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                    <span class="whish-list-price">
                                       {{ ($product[1] * $product[2] )}}
                                    </span></td>

                            <td class="text-center">
                                <a href="#"> <span class="trash"><i class="fas fa-trash-alt"></i> </span></a>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn theme-btn--dark1 btn--lg">buy now</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
