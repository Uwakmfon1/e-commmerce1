<!DOCTYPE html>
<html lang="en">
<head>

    @include("admin.css")
    <style type="text/css">
        *{
            text-decoration: none;
        }
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
        }

        .table_deg {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .th_deg {
            background-color: skyblue;
        }

        .img_deg {
            width: 100px;
            height: 100px;
        }



    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    @include("admin.header")
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- page-body-wrapper ends -->
            <h2 class="title_deg">All Orders</h2>

            <table class="table_deg">
                <tr class="th_deg">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Delivered</th>
                    <th>Download PDF</th>
                </tr>

                @foreach($order as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            <img src="product/{{$order->image}}" class="img_deg">
                        </td>
                        <td>
                            @if($order->delivery_status == 'processing')
                                <a href="{{url('delivered',$order->id)}}" class="btn btn-primary"
                                   onclick="return confirm('Are you sure this product is delivered?')">Delivered</a>
                            @else
                                <p style="color:darkgreen;">Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
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

