<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .submit {
            background: transparent;
            border: 1px solid white;
            color: white;
            padding: 5px;
        }

    </style>
    @include("admin.css")
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    @include("admin.header")
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

            <div class="div_center">
                <h1 class="font_size">Add Product</h1>
                <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label>Product Title: </label>
                        <input type="text" name="title" class="text_color" placeholder="Write a title" required="">
                    </div>


                    <div class="div_design">
                        <label>Product Description: </label>
                        <input type="text" name="description" class="text_color" placeholder="Write a Description"
                               required="">
                    </div>

                    <div class="div_design">
                        <label>Product Price: </label>
                        <input type="number" name="price" class="text_color" placeholder="Enter a price" required="">
                    </div>

                    <div class="div_design">
                        <label>discount price: </label>
                        <input type="text" name="dis_price" class="text_color" placeholder="Discount Price" required="">
                    </div>

                    <div class="div_design">
                        <label>Product Quantity: </label>
                        <input type="number" name="quantity" min="0" class="text_color" placeholder="choose a quantity"
                               required="">
                    </div>


                    <div class="div_design">
                        <label>Product Category: </label>
                        <select class="text_color" name="category">
                            <option value="" selected="">Add a Category</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="div_design">
                        <label>Product Image Here</label>
                        <input type="file" name="image" placeholder="select an image" required="">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Add Category">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- page-body-wrapper ends -->


    <!-- container-scroller -->
@include("admin.script")
</body>
</html>

