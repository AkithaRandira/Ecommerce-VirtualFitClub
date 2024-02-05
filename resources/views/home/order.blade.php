<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Virtual Fit Club</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            color: #1726ef;

        }

        Table,
        th,
        td {
            border: 1px solid #1726ef;
            border-collapse: collapse;
            padding: 10px;

        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div>
            <div class="div_center">
                <h2 class="h2_font">Orders</h2>

            </div>

            <table class="center">
                <tr>
                    <th>Orders</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivary Status</th>
                    <th>Product Image</th>
                    <th>Cancel order</th>

                </tr>

                @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivary_status }}</td>
                        <td>

                            <img height="100" width="150" src="product/{{ $order->image }}">

                        </td>
                        <td>
                            @if ($order->delivary_status == 'processing')
                                <a onclick="return confirm('Are You Sure To CAncel This Order')" class="btn btn-danger"
                                    href="{{ url('cancel_order', $order->id) }}">Cancel Order</a>
                            @else
                                <p class="btn btn-success">Order Delivered</p>
                            @endif
                    </tr>
                @endforeach

            </table>
        </div>


    </div>




    <div class="cpy_">
        <p class="mx-auto">© 2024 All Rights Reserved By Virtual Fit Club<a href=""></a><br>

            Distributed By <a href="">Virtual Fit Club</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>
