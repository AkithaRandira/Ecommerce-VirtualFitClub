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

    <style type="text/css">
        .center {
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        table,
        th,
        td {
            border: 1px solid #1726ef;
            border-collapse: collapse;
            padding: 10px;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        .img_desg {
            width: 130px;
            height: 150px;
        }

        .total_deg {
            margin-top: 20px;
            text-align: center;
            font-size: 30px;
            color: #1726ef;
            margin-bottom: 20px;
        }

        .buttons {
            text-align: center;
            margin-bottom: 20px
        }

        .btn-success {
            background-color: #1726ef;
            color: #fff;
            padding: 10px 20px;
            border: none;

            border-radius: 10px;
            cursor: pointer;
        }

        h1 {
            color: #29ef17;
           
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->


        @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

        <div class="center">
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Product Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                <tr>

                    <?php $totalprice = 0; ?>

                    @foreach ($cart as $cart)
                <tr>
                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>Rs. {{ $cart->price }}</td>
                    <td><img class="img_desg" src="/product/{{ $cart->image }}"></td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete This')"
                            href="{{ url('remove_cart', $cart->id) }}">Remove</a>
                    </td>
                </tr>

                <?php $totalprice = $totalprice + $cart->price; ?>
                @endforeach



            </table>
            <div>
                <h1 class="total_deg">Total Price: Rs. {{ $totalprice }}</h1>


                <div class="buttons">
                    <h6 style="margin-bottom: 20px ">Proceed to Order</h6>
                    <a href="{{url('cash_order')}}" class="btn btn-success">Cash On Delivery</a>
                    <a href="{{url('stripe',$totalprice)}}" class="btn btn-success">Pay Using Card</a>
                </div>
            </div>
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
