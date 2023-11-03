<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include("admin.css")
</head>
<style>
    .title {
        text-align: center;
        font-size: 25px;
    }
    label{
        display: inline-block;
        width:150px;
        font-size:15px;
        font-weight: bold;
    }
    input{
        color: black;
    }
</style>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    @include("admin.header")

    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        x
                    </button>
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1 class="title">Send Email To {{$order->email}}</h1>
            <form action="{{url('/send_user_email',$order->id)}}" method="POST">
                @csrf
                <div style="padding-left: 35%;padding-top: 30px">
                    <label>Email Greeting:</label>
                    <input type="text" name="greeting" style="color: black;">
                </div>

                <div style="padding-left: 35%;padding-top: 30px">
                    <label>Email First Line:</label>
                    <input type="text" name="firstLine" style="color: black;">
                </div>

                <div style="padding-left: 35%;padding-top: 30px">
                    <label>Email Body: </label>
                    <input type="text" name="body" style="color: black;">
                </div>

                <div style="padding-left: 35%;padding-top: 30px">
                    <label>Email Buttton Name: </label>
                    <input type="text" name="button" style="color:black;">
                </div>

                <div style="padding-left: 35%;padding-top: 30px">
                    <label>Email url: </label>
                    <input type="text" name="url" style="color: black;">
                </div>

                <div style="padding-left: 35%;padding-top: 30px">
                    <label>Email Last Line: </label>
                    <input type="text" name="lastLine" style="color: black;">
                </div>

                <div style="padding-left: 35%;padding-top: 30px">
                    <input type="submit" value="Send Email" class="btn btn-primary">
                </div>


            </form>
        </div>
    </div>

    <!-- page-body-wrapper ends -->
    {{--    @include("admin.body")--}}

    <!-- container-scroller -->
@include("admin.script")
</body>
</html>

