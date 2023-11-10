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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    @include("home.header")
    <!-- end header section -->

    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <div>
                    <form action="{{url('product_search')}}" method="GET">
                        @csrf
                        <div style="display: flex;">
                            <input type="text" name="search" style="width:400px" placeholder="Search for something">
                            <input type="submit" value="submit" style="height:42px; padding:10px; margin-left: 5px;">
                        </div>

                    </form>
                </div>
            </div>
            <div class="main-panel">
                <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        x
                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif
                </div>
            </div>
            <div class="row">
                @foreach($product as $products)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{url('/product_details',$products->id)}}" class="option1">
                                        Product Details
                                    </a>
                                    <form action="{{url('/add_cart',$products->id)}}" method="post"
                                          style="display: flex">
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
                            <div class="img-box">
                                <img src="product/{{$products->image}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{$products->title}}
                                </h5>
                                @if($products->discount_price != null)
                                    <h6 style="color: red">
                                        Discount Price:
                                        <br>
                                        ₦{{$products->discount_price}}
                                    </h6>

                                    <h6 style="color: blue;">
                                        Price:
                                        <br>
                                        <span style="text-decoration: line-through;color: blue;">
                                    ₦{{$products->price}}
                                </span>

                                    </h6>
                                @else
                                    <h6 style="color: blue;">
                                        Price:
                                        <br>
                                        <span style="color: blue;">
                                    ₦{{$products->price}}
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br><br>
            <span style="padding-top:20px">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
           </span>
        </div>
    </section>


    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
        window.onbeforeunload = function (e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- jQery -->
    <script src="home/fjs/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/fjs/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/fjs/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/fjs/custom.js"></script>



@include('admin.script')
</div>
</body>
</html>
