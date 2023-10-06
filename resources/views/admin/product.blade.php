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
            <div class="div_center">
                <h1 class="font_size">Add Product</h1>
                <div>
                    <label>Product Title: </label>
                    <input type="text" name="title" class="text_color" placeholder="Write a title">
                </div>
                <div>
                    <label>Product Title: </label>
                    <input type="text" name="description" class="text_color" placeholder="Write a Description">
                </div>
                <div>
                    <label>Product Title: </label>
                    <input type="file" name="img" class="text_color" placeholder="select an image">
                </div>
                <div>
                    <label>Product Price: </label>
                    <input type="number" name="price" class="text_color" placeholder="Enter a price">
                </div>
                <div></div>
                <div>
                    <label>Product Title: </label>
                    <input type="number" name="quantity" min="0" class="text_color" placeholder="choose a quantity">
                </div>
                <div>
                    <label>Product Title: </label>
                    <input type="text" name="category" class="text_color" placeholder="Which Category">
                </div>
            </div>
        </div>
    </div>
    <!-- page-body-wrapper ends -->


    <!-- container-scroller -->
@include("admin.script")
</body>
</html>

