<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}"/>
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet"/>

    <style type="text/css">
        .center {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }

        .img_deg {
            height: 200px;
            width: 200px;
        }

        table, th, td {
            border: 1px solid grey;
        }

        .th_deg {
            font-size: 30px;
            padding: 5px;
            background-color: skyblue;
        }
        .total_deg{
            padding:40px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include("home.header")
    <!-- end header section -->

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                x
            </button>
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>
            </tr>
            <?php $totalPrice = 0; ?>
            @foreach($order as $order)
                <tr>
                    <td>{{ $order->product_title}}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td><img class="img_deg" src="/product/{{$order->image}}"></td>
                    <td>
                        @if($order->delivery_status == 'processing')
                        <a class="btn btn-danger"
                           style="margin:10px;"
                           onclick="return confirm('Are you sure you want to cancel this order')"
                           href="{{url('cancel_order',$order->id)}}">Cancel Order</a>
                        @else
                            <p style="color: blue;">
                                Not Allowed
                            </p>
                        @endif
                    </td>

{{--                    <td>--}}
{{--                        <a class="btn btn-danger" style="margin:10px;" onclick="confirm('Are you sure you want to delete this?')"--}}
{{--                           href="{{url('remove_cart', $cart->id)}}">Remove Product</a>--}}
{{--                    </td>--}}
                </tr>
{{--                    <?php $totalPrice = $totalPrice + $cart->price; ?>--}}
            @endforeach
        </table>

    </div>






    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/fjs/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/fjs/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/fjs/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/fjs/custom.js"></script>
</body>
</html>
