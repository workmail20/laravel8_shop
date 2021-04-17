@extends('layouts.main')

@section('title','Home')



@section('content')

<script>
    function addToCart($id, $count) {
        $.ajax({
            url: "{{ route('addToCart') }}",
            type: "POST",
            data: {
                id: $id,
                count: $count
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data)
            }
        });
    }
</script>
<!-- product tab start -->
<section class="product-tab bg-white pt-50 pb-80">
    <div class="container">
        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <div class="product-slider-init theme1 slick-nav">
                            @foreach($products as $product)

                            @php
                            $image = '';
                            if(count($product->images)>0){
                            $image = $product->images[0]['img'];
                            } else{
                            $image = 'no_image.png';
                            }

                            @endphp
                            <div class="slider-item">
                                <div class="product-list mb-30">
                                    <div class="card product-card">
                                        <div class="card-body p-0">
                                            <div class="media flex-column">
                                                <div class="product-thumbnail position-relative">
                                                    <span class="badge badge-danger top-right">New</span>
                                                    <a href="{{ route('showProduct',['product',$product->id]) }}">
                                                        <img style="height: 200px; width: auto;" class="first-img" src="assets/img/products/{{ $image }}"
                                                             alt="thumbnail">
                                                    </a>
                                                    <!-- product links -->
                                                    <ul class="product-links d-flex justify-content-center">
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#compare">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                      title="Add to compare" class="icon-shuffle"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#quick-view">
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                      title="Quick view" class="icon-magnifier"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- product links end-->
                                                </div>
                                                <div class="media-body">
                                                    <div class="product-desc">
                                                        <h3 class="title"><a href="{{ route('showProduct',['product',$product->id]) }}"> {{ $product->title }}</a></h3>
                                                        <div class="star-rating">
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star de-selected"></span>
                                                        </div>
                                                        @if($product->new_price != null)

                                                        <h6  style="text-decoration: line-through" class="">${{ $product->price }}</h6>
                                                        <div class="d-flex align-items-center justify-content-between">

                                                            <h6 class="product-price">${{ $product->new_price }}</h6>

                                                            <button onclick="addToCart({{$product->id}}, 1)" class="pro-btn" data-toggle="modal"
                                                                    data-target="#add-to-cart"><i
                                                                    class="icon-basket"></i></button>
                                                        </div>
                                                        @else
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="product-price">${{ $product->price }}</h6>

                                                            <button onclick="addToCart({{$product->id}}, 1)" class="pro-btn" data-toggle="modal"
                                                                    data-target="#add-to-cart"><i
                                                                    class="icon-basket"></i></button>
                                                        </div>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-list End -->

                                </div>


                            </div>
                            <!-- slider-item end -->

                            @endforeach


                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->



<!-- brand slider start -->
<div class="brand-slider-section theme1 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand-init border-top py-35 slick-nav-brand">
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/1.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/2.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/3.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/4.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/5.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/2.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-brand">
                            <a href="https://themeforest.net/user/hastech" class="brand-thumb">
                                <img src="assets/img/brand/3.jpg" alt="brand-thumb-nail">
                            </a>
                        </div>
                    </div>
                    <!-- slider-item end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand slider end -->
@endsection
