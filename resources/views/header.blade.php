<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo     URL::to('/')?>/css/bootstrap2.css">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <title>RPG</title>
</head>
<body>

<div class="container">
    @if(\Illuminate\Support\Facades\Auth::check())
    <div class="col-md-12"><a href="<?php echo     URL::to('/')?>">Home</a></div>
    @endif
    <div class="col-md-12">
        @yield('content')</div>
    </div>


</body>
</html>

<style>
    .bordered_div{
        border: 1px solid black;
    }
    .def_img {
        height: 40px;
    }

    .img_icon{
        height: 40px;
    }

    .img_icon_small{
        height: 30px;
    }

    #items img{
        height: 40px;
    }
    #achive img{
        height: 40px;
    }

    .txt_qty {
        width: 50px;
    }

    .txt_qtyB {
        width: 50px;
    }

    #message {
        height: 200px;
        overflow: scroll;
    }

    .box {
        border: 1px solid black;
    }

    #userlist td {
        height: 20px;
    }

    #myProgress {
        width: 100px;
        background-color: white;
        border: 1px solid black;
    }

    .bar {
        width: 0%;
        height: 10px;
        background-color: green;
    }



</style>
<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        -webkit-animation-name: fadeIn; /* Fade in the background */
        -webkit-animation-duration: 0.4s;
        animation-name: fadeIn;
        animation-duration: 0.4s
    }

    /* Modal Content */
    .modal-content {
        position: fixed;
        bottom: 50%;
        background-color: #fefefe;
        width: 100%;
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 0.4s;
        animation-name: slideIn;
        animation-duration: 0.4s
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }

    /* Add Animation */
    @-webkit-keyframes slideIn {
        from {opacity: 0}
        to {opacity: 1}
    }

    @keyframes slideIn {
        from { opacity: 0}
        to { opacity: 1}
    }

    @-webkit-keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }

    @keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }
</style>