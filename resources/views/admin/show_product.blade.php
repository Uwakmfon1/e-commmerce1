<!DOCTYPE html>
<html lang="en">
<head>

    @include("admin.css")
    <style>
        .div_center {
            text-align: center;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        form {
            color: black;
        }

        .img_style {
            width: 150px;
            height: 150px;
        }

        .center {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
            padding: 10px;
        }

        .tr_color {
            background-color: skyblue;
        }

        .th_deg {
            padding: 30px;
        }

        .font_size {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
            padding-bottom:20px;
        }
        .size{
            /*text-align: center;*/
            /*height: 50px;*/
            /*width: 80px;*/
            text-align: center;
            margin-left:45%;
            padding: 8px;
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
            @if($product->count() == 0)

                    <h2 class="font_size">No products Yet</h2>
                    <a href="{{ url('/view_product') }}" class="btn btn-success size" >Add products</a>


            @else

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            x
                        </button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <h2 class="font_size">All Products</h2>
                <table class="center">
                    <tr class="tr_color">
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete product</th>
                        <th class="th_deg">Edit product</th>
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
                                <img src="/product/{{$product->image}}" class="img_style">
                            </th>

                            <th>
                                <a href="{{ url('/delete_product',$product->id) }}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this product?')"
                                >Delete</a>
                            </th>

                            <th>
                                <a href="{{ url('/update_product',$product->id) }}" class="btn btn-success">Edit</a>
                            </th>
                        </tr>

                    @endforeach
                </table>
            @endif
        </div>
    </div>

    <!-- container-scroller -->
@include("admin.script")
</body>
</html>

