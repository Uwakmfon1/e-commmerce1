<!DOCTYPE html>
<html lang="en">
<head>

    @include("admin.css")
    <style type="text/css">
        * {
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

            <div style="padding-left:40%;padding-bottom:30px;">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" name="search" placeholder="Search for Something" style="color:black;">

                    <input type="submit" class="btn btn-outline-primary" value="Search">
                </form>
            </div>

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
                    <th>Send Email</th>
                </tr>

                @forelse($order as $order)
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
                        <td>
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="16">No Data Found</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    <!-- container-scroller -->
@include("admin.script")
</body>
</html>

