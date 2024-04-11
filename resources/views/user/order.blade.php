@include('user.includes.header')
@include('user.includes.nav')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My Account</span>
                </p>
                <h1 class="mb-0 bread">Orders</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                @if ($orders->isEmpty())
                    <div class="alert alert-info" role="alert" style="text-align: center">
                        You Have Not Placed Any Order yet.
                    </div>
                    <p style="text-align: center"><a href="/shop" class="btn btn-primary">Shop now</a></p>
                @else
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Billing Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ ucfirst($order->status) }}</td>
                                        <td><a href="/orderdetails?id={{ $order->id }}"
                                                class="btn btn-primary">View</a></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="6">
                                            <div class="progress">
                                                @php
                                                    $progress = 0;
                                                    switch ($order->status) {
                                                        case 'Ordered':
                                                            $progress = 25;
                                                            break;
                                                        case 'Processed':
                                                            $progress = 50;
                                                            break;
                                                        case 'Dispatched':
                                                            $progress = 75;
                                                            break;
                                                        case 'Delivered':
                                                            $progress = 100;
                                                            break;
                                                    }
                                                @endphp
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $progress }}%;"
                                                    aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $progress }}%</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@include('user.includes.footer')
