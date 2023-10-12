<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.css")
    <style>
        .div_center{
            text-align: center;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        form{
            color: black;
        }

        .center{
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
            padding: 10px;
        }
    .font_size{
        text-align: center;
        font-size: 40px;
        padding-top: 20px;

    }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    @include("admin.header")
    <!-- page-body-wrapper ends -->
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="font_size">All Products</h2>
            <table class="center">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Product Image</th>
                </tr>
                @foreach($product as $product)
                    <tr>
                        <th>{{ $product->title }}</th>
                        <th>{{ $product->description }}</th>
                        <th>{{ $product->quantity }}</th>
                        <th>{{ $product->category }}</th>
                        <th>{{ $product->price }}</th>
                        <th>{{ $product->discount_price }}</th>
                        <th>
                            <img src="/product/{{$product->image}}">
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- container-scroller -->
@include("admin.script")
</body>
</html>

