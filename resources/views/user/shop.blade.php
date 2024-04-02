@include('user.includes.header')
@include('user.includes.nav')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <!-- Product categories -->
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category ">
                    <li><a class="product-toggle active" data-toggle="all">All</a></li>
                    <!-- Display all products -->
                    @foreach ($products as $product)
                        <li><a class="product-toggle" data-toggle="{{ $product->id }}">{{ $product->product_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Products and sub-products -->
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-12 ftco-animate fadeInUp ftco-animated product-panel sub-product"
                    data-parent="{{ $product->id }}" id="product-{{ $product->id }}" style="display: none;">
                    <h2>{{ $product->product_name }}</h2>
                    <!-- Display sub-products -->
                    <div class="row">
                        @foreach ($product->subProducts as $subProduct)
                            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                                <div class="product">
                                    <a href="#" class="img-prod"><img class="img-fluid"
                                            src="images/{{ $subProduct->image }}"
                                            alt="{{ $subProduct->subproduct_name }}"></a>
                                    <div class="text py-3 pb-4 px-3 text-center">
                                        <h3><a href="#">{{ $subProduct->subproduct_name }}</a></h3>
                                        @if ($subProduct->price == 0)
                                            <p class="out-of-stock">Out of Stock</p>
                                        @else
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    <p class="price"><span>{{ $subProduct->price }}®</span></p>
                                                </div>
                                            </div>
                                            <div class="bottom-area d-flex px-3">
                                                <div class="m-auto d-flex">
                                                    <a href="#"
                                                        class="buy-now d-flex justify-content-center align-items-center mx-1 add-to-cart"
                                                        data-spid="{{ $subProduct->id }}"
                                                        data-price="{{ $subProduct->price }}">
                                                        <span><i class="ion-ios-cart"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{-- <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</section>

@include('user.includes.footer')
<script>
    $(document).ready(function() {
        $('.sub-product').show();
        $('.product-toggle').click(function() {
            $('.product-category li a').removeClass('active');
            // Add active class to the clicked product toggle
            $(this).addClass('active');
            var productId = $(this).data('toggle');
            console.log("Clicked product ID:", productId); // Check if the correct product ID is logged

            if (productId === 'all') {
                console.log("Showing all sub-products");
                $('.sub-product').show();
            } else {
                console.log("Hiding all sub-products except for product ID:", productId);
                $('.sub-product').hide();
                $('.sub-product[data-parent="' + productId + '"]').show();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            var spid = $(this).data('spid');
            var price = $(this).data('price');

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '/addcart',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'spid': spid,
                    'price': price
                },
                success: function(data) {
                    toastr.success(data.success);
                    $('#total-products-in-cart').text('[' + data.total + ']');
                    //alert(data.success); // Display success message
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors
                }
            });
        });
    });
</script>
