<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <base href="/public">
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
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css"/>
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet"/>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include("home.header")


    <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding: 30px;">
        <div class="box">
            <div class="img-box">
                <img src="product/{{$product->image}}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{$product->title}}
                </h5>
                @if($product->discount_price != null)
                    <div style="display:flex;">
                        <h6 style="color: red">
                            Discount Price:
                            <br>
                            ₦{{$product->discount_price}}
                        </h6>

                        <h6 style="color: blue;">
                            Price:
                            <br>
                            <span style="text-decoration: line-through;color: blue;">
                                    ₦{{$product->price}}
                                </span>
                        </h6>
                    </div>
                        @else
                            <h6 style="color: blue;">
                                Price:
                                <br>
                                <span style="color: blue;">
                                    ₦{{$product->price}}
                                </span>
                            </h6>
{{--                    </div>--}}
                @endif

                <h6><b>Product Category:</b>{{$product->category}}</h6>

                <h6><b>Available Quantity:</b>{{$product->quantity}}</h6>
                <form action="{{url('/add_cart',$product->id)}}" method="post" style="display: flex">
                    @csrf
                    <div class="col-md-4">
                        <input type="number" min="1" value="1" name="quantity" width="100px">
                    </div>

                    <div class="col-md-4">
                        <input type="submit" value="Add To Cart">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer start -->
    @include("home.footer")
    <!-- footer end -->
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
