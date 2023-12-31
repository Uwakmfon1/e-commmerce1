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
           text-align: center;
           border: 3px solid white;
           margin-top: 30px;
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
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        x
                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>

                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" class="input_color" placeholder="Enter Category name" name="category">
                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                </form>
            </div>
            <table class="center">
                <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>

                @foreach($data as $data)

                    <tr>
                        <td>{{ $data->category_name }}</td>

                        <td>
                            <a onclick="confirm('Are You Sure To Delete This?')"
                                href="{{url('/delete_category',$data->id)}}" class="btn btn-danger" >Delete</a>
                        </td>


                    </tr>




                @endforeach
            </table>
        </div>
    </div>

<!-- container-scroller -->
@include("admin.script")
</body>
</html>

