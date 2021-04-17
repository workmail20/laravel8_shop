@extends('layouts.main')

@section('title','Home')
@section('custom_css')


@endsection

@section('custom_js')


@endsection


@section('content')
<script>
    $(document).ready(function () {
        $('#addcart').click(function () {
            addToCart({{ $item->id }}, $('#qm').val());
        })
    });

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
<!-- product-single start -->
<section class="product-single theme3 pt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="position-relative">
                    <span class="badge badge-danger top-right">New</span>
                </div>
                <div class="product-sync-init mb-20">

                    @foreach($item->images as $image)

                    <div class="single-product" style="width: 300px;  margin: auto;">
                        <div class="product-thumb" style="width: 300px;  margin: auto;">
                            <img style="width: 300px; margin: auto;" src="/assets/img/products/{{ $image->img }}"
                                 alt="product-thumb">
                        </div>
                    </div>

                    @endforeach


                </div>

                <div class="product-sync-nav single-product">
                    @foreach($item->images as $image)
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"> <img style="width: 300px"
                                                               src="/assets/img/products/{{ $image->img }}"
                                                               alt="product-thumb"></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-md-0">
                <div class="single-product-info">
                    <div class="product-body mb-40">
                        <div class="d-flex align-items-center mb-30">
                            @if($item->new_price != null)
                            <h6 class="product-price mr-20">
                                <del class="del">${{ $item->new_price }}</del>
                                <span class="onsale">${{ $item->price }}</span></h6>
                            @else
                            <h6 class="product-price mr-20">
                                <del class="del">${{ $item->price }}</del>
                                <span class="onsale">${{ $item->price }}</span></h6>
                            @endif

                        </div>
                        <p>Block out the haters with the fresh adidas® Originals Kaval Windbreaker Jacket.</p>
                        <ul>
                            <li>Part of the Kaval Collection.</li>
                            <li>Regular fit is eased, but not sloppy, and perfect for any activity.</li>
                            <li>Plain-woven jacket specifically constructed for freedom of movement.</li>
                        </ul>
                    </div>
                    <div class="product-footer">
                        <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                            <div class="count d-flex">
                                <input id="qm" type="number" min="1" max="10" step="1" value="1">
                                <div class="button-group">
                                    <button class="count-btn increment"><i class="fas fa-chevron-up"></i></button>
                                    <button class="count-btn decrement"><i class="fas fa-chevron-down"></i></button>
                                </div>
                            </div>
                            <div>
                                <button id="addcart" class="btn theme-btn--dark3 btn--xl mt-5 mt-sm-0 rounded-5">
                                    <span class="mr-2"><i class="ion-android-add"></i></span>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                        <div class="addto-whish-list">
                            <a href="#"><i class="icon-heart"></i> Add to wishlist</a>
                            <a href="#"><i class="icon-shuffle"></i> Add to compare</a>
                        </div>
                        <div class="pro-social-links mt-10">
                            <ul class="d-flex align-items-center">
                                <li class="share">Share</li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-google"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-single end -->
<!-- product tab start -->
<div class="product-tab theme3 bg-white pt-60 pb-80">
    <div class="container">
        <div class="product-tab-nav">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav class="product-tab-menu single-product">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                   role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                   role="tab" aria-controls="pills-profile" aria-selected="false">Product Details</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <div class="single-product-desc">
                            {{ $item->description }}
                        </div>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="single-product-desc">
                            <div class="studio-thumb">

                                <h6>In stock:
                                    @if($item->in_stock)
                                    <small>In Stock</small>
                                    @else
                                    <small style="color:#cc0000">None</small>
                                    @endif
                                </h6>
                                <h3>Data sheet</h3>
                            </div>
                            <div class="product-features">

                            </div>
                        </div>
                    </div>
                    <!-- third tab-pane -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="single-product-desc">
                            <div class="grade-content">
                                <span class="grade">Grade </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <h6 class="sub-title">test</h6>
                                <p>23/09/2020</p>
                                <h4 class="title">test</h4>
                                <p>test</p>
                            </div>
                            <hr class="hr">
                            <div class="grade-content">
                                <span class="grade">Grade </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <h6 class="sub-title">Hastheme</h6>
                                <p>23/09/2020</p>
                                <h4 class="title">demo</h4>
                                <p>ok !</p>
                                <a href="#" class="btn theme-btn--dark3 theme-btn--dark3-sm btn--sm rounded-5 mt-15"
                                   data-toggle="modal" data-target="#exampleModalCenter">Write your review !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->

<!-- footer strat -->

<!-- modals start -->
<!-- first modal -->
<div class="modal fade theme3 style1" id="quick-view" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 mx-auto col-lg-5 mb-5 mb-lg-0">
                        <div class="product-sync-init mb-20">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/4.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/5.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/6.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="assets/img/hot-deals/thumb/7.jpg" alt="product-thumb">
                                </div>
                            </div>
                            <!-- single-product end -->
                        </div>

                        <div class="product-sync-nav">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"> <img src="assets/img/hot-deals/thumb/4.2x.jpg"
                                                                       alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"> <img src="assets/img/hot-deals/thumb/5.2x.jpg"
                                                                       alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"><img src="assets/img/hot-deals/thumb/6.2x.jpg"
                                                                      alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)"><img src="assets/img/hot-deals/thumb/7.2x.jpg"
                                                                      alt="product-thumb"></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade style3" id="add-to-cart" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <h5 class="modal-title" id="add-to-cartCenterTitle"><span class="ion-checkmark-round"></span>
                    Product successfully added to your shopping cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 divide-right">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="assets/img/hot-deals/thumb/4.2x.jpg" alt="img">
                            </div>
                            <div class="col-md-6 mb-2 mb-md-0">
                                <h4 class="product-name">New Balance Running Arishi trainers in triple</h4>
                                <h5 class="price">$$29.00</h5>
                                <h6 class="color"><strong>Dimension: </strong>: <span class="dmc">40x60cm</span></h6>
                                <h6 class="quantity"><strong>Quantity:</strong>&nbsp;1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="modal-cart-content">
                            <p class="cart-products-count">There is 1 item in your cart.</p>
                            <p><strong>Total products:</strong>&nbsp;$123.72</p>
                            <p><strong>Total shipping:</strong>&nbsp;$7.00 </p>
                            <p><strong>Taxes</strong>&nbsp;$0.00</p>
                            <p><strong>Total:</strong>&nbsp;$130.72 (tax excl.)</p>
                            <div class="cart-content-btn">
                                <button type="button" class="btn theme-btn--dark3 btn--md mt-4"
                                        data-dismiss="modal">Continue
                                    shopping
                                </button>
                                <button class="btn theme-btn--dark3 btn--md mt-4"><i
                                        class="ion-checkmark-round"></i>Proceed to
                                    checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- third modal -->
<div class="modal fade show style4" id="exampleModalCenter" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <h5 class="modal-title bg-dark text-white">Write your review</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="modal-thumb">
                            <img src="assets/img/single-product/1.2x.jpg" alt="modal-thumb">
                            <h3 class="title">Originals Windbreaker Winter Jacket</h3>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="modal-form">
                            <h3 class="title">Write your review</h3>
                            <div class="star-content pb-3">
                                <span class="quality mr-2">Quality</span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                            </div>

                            <form>
                                <div class="form-group">
                                    <label class="title" for="text-filed113">Title for your review <sup
                                            class="required">*</sup></label>
                                    <input type="text" class="form-control" id="text-filed113">
                                </div>
                                <div class="form-group">
                                    <label for="text-filed21">Your review <sup class="required">*</sup></label>
                                    <textarea class="form-control textarea" id="text-filed21" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="text-filed031">Your name <sup class="required">*</sup></label>
                                    <input type="text" class="form-control" id="text-filed031">
                                </div>
                            </form>
                            <div class="form-group mt-3">
                                <span class="required"><sup>*</sup> Required fields</span>
                                <div class="text-right">
                                    <button type="button"
                                            class="btn theme-btn--dark3 theme-btn--dark3-sm btn--sm rounded-5">Send
                                    </button>
                                    <span class="d-inline-block mx-2 or">or </span>
                                    <button type="button"
                                            class="btn theme-btn--dark3 theme-btn--dark3-sm btn--sm rounded-5"
                                            data-dismiss="modal">cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modals end -->


<!--***********************
    all js files
 ***********************-->

<!--******************************************************
    jquery,modernizr ,poppe,bootstrap,plugins and main js
 ******************************************************-->


<!-- Use the minified version files listed below for better performance and remove the files listed above -->

<!--***************************
      Minified  js
 ***************************-->

<!--***********************************
     vendor,plugins and main js
  ***********************************-->

<!-- <script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
<script src="assets/js/main.js"></script> -->


@endsection

