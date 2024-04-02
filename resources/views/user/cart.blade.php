@include('user.includes.header')
@include('user.includes.nav')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Cart</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                @if ($carts->isEmpty())
                    <div class="alert alert-info" role="alert" style="text-align: center">
                        Your cart is empty.
                    </div>
                    <p style="text-align: center"><a href="/shop" class="btn btn-primary">Shop now</a></p>
                @else
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr class="text-center">
                                        <td class="product-remove">
                                            <a>
                                                <span class="remove-item" data-id="{{ $cart->id }}"><span
                                                        class="ion-ios-close"></span></span>
                                            </a>
                                        </td>
                                        <td class="image-prod">
                                            <div class="img"
                                                style="background-image:url(images/{{ $cart->subProduct->image }});">
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <h3>{{ $cart->subProduct->subproduct_name }}</h3>
                                            <p>{{ $cart->subProduct->subproduct_description }}</p>
                                        </td>
                                        <td class="price">{{ $cart->price }}®</td>
                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" id="quantity-{{ $cart->id }}" name="quantity"
                                                    class="quantity form-control input-number"
                                                    value="{{ $cart->qty }}" min="1" max="100">
                                            </div>
                                        </td>
                                        <td class="total">${{ $cart->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
        @if (!$carts->isEmpty())
            <div class="row justify-content-end">
                <div class="col-lg-12 mt-5 cart-wrap ftco-animate fadeInUp ftco-animated">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex total-price">
                            <span>Subtotal</span>
                            <span id="subtotal"></span>
                        </p>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="total"></span>
                        </p>
                    </div>
                    <p style="display: flex; justify-content: center;">
                        <a href="/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>

@include('user.includes.footer')


<script>
    $(document).ready(function() {
        // Function to update cart totals
        function updateCartTotals() {
            // Calculate subtotal
            var subtotal = 0;
            $('.total').each(function() {
                subtotal += parseFloat($(this).text().replace('$', ''));
            });

            // Update subtotal
            $('#subtotal').text('$' + subtotal.toFixed(2));

            // Calculate total (assuming no delivery charge and a $3 discount)
            //var discount = 3;
            var total = subtotal;

            // Update total
            $('#total').text('$' + total.toFixed(2));
        }

        // Listen for changes in quantity input fields
        $('.quantity input').on('change', function() {
            var quantity = parseInt($(this).val());
            var cartId = $(this).attr('id').split('-')[1];
            var price = parseFloat($(this).closest('tr').find('.price').text().replace('$', ''));
            var total = quantity * price;

            // Update total for this item
            $(this).closest('tr').find('.total').text('$' + total.toFixed(2));

            // Update cart totals
            updateCartTotals();

            // AJAX request to update quantity
            $.ajax({
                url: '/update_cart_quantity', // URL to your update cart quantity endpoint
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'cart_id': cartId,
                    'quantity': quantity
                },
                success: function(response) {
                    // Handle success response if needed
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                    console.error(error);
                }
            });
        });

        updateCartTotals();
    });
</script>


<script>
    $(document).ready(function() {
        // Event listener for the close icon
        $('.remove-item').on('click', function() {
            // Get the ID of the cart item to be removed
            var cartId = $(this).data('id');

            // Send an AJAX request to delete the item
            $.ajax({
                url: '/cart/' + cartId,
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success(response.success);
                    // Reload the page or update the cart dynamically as needed
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                    // For simplicity, reload the page
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Failed to remove item from cart.');
                }
            });
        });
    });
</script>
