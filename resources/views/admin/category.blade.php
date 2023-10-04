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
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>

                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" class="input_color" placeholder="Enter Category name" name="category">
                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                </form>
            </div>
        </div>
    </div>

<!-- container-scroller -->
@include("admin.script")
</body>
</html>

