<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BGES TELKOM - EDIT PELANGGAN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
<!--[if lt IE 9]>
{!! Html::script('js/respond.min.js') !!}
{!! Html::script('js/html5shiv.js') !!}
        <!-- Place favicon.ico in the root directory -->
{!! Html::style('https://fonts.googleapis.com/css?family=Lato:400,300,700') !!}
{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/font-awesome.min.css') !!}
{!! Html::style('css/owl.carousel.css') !!}
{!! Html::style('css/responsive.css') !!}
{!! Html::style('css/style.css') !!}

<!-- data table-->
    {!! Html::style('css/jquery.dataTables.css') !!}
    {!! Html::style('css/dataTables.bootstrap.css') !!}
    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<!-- start preloader -->
<div id="loader-wrapper">
    <div class="logo"></div>
    <div id="loader">
    </div>
</div>
<!-- end preloader -->
<!--[if lt IE 8]>
<![endif]-->
<!-- Start Header Section -->
<header class="main_menu_sec navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="lft_hd">
                    {!! Html::image('img/logo.png') !!}
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="rgt_hd">
                    <div class="main_menu">
                        <nav id="nav_menu">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar"
                                    data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div id="navbar">
                                <ul>
                                    @if (Auth::guest())
                                        <li><a class="page-scroll" href="{{url('/')}}">Home</a></li>
                                        <li><a href="#">AM <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a class="page-scroll" href="{{url('/am')}}">Detail AM </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pelanggan<i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a class="page-scroll" href="{{url('/pelanggan')}}">Daftar
                                                        Pelanggan</a>
                                                </li>
                                                {{--<li><a href="{{route('pelanggan.create')}}">Tambah Pelanggan</a></li>--}}
                                            </ul>
                                        </li>
                                        <li><a href="/#">Transaksi<i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a class="page-scroll" href="{{url('/#pr_sec')}}">Tabel Transaksi</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="page-scroll" href="{{url('/#abt_sec')}}">Statistik</a></li>
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                    @else
                                        <li><a class="page-scroll" href="{{url('/')}}">Home</a></li>
                                        <li><a href="#">AM <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a class="page-scroll" href="{{route('am.create')}}">Tambah AM</a>
                                                </li>
                                                <li><a class="page-scroll" href="{{url('/am')}}">Detail AM</a>
                                                </li>
                                            </ul>
                                        <li><a href="#">Pelanggan<i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a class="page-scroll" href="{{url('/pelanggan')}}">Daftar
                                                        Pelanggan</a>
                                                </li>
                                                <li>
                                                    <a class="page-scroll" href="{{route('pelanggan.create')}}">Tambah Pelanggan</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Transaksi<i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a class="page-scroll" href="{{url('/#pr_sec')}}">Tabel Transaksi</a>
                                                </li>
                                                <li>
                                                    <a class="page-scroll" href="{{route('transaksi.create')}}">Buat Transaksi</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="page-scroll" href="{{url('/#abt_sec')}}">Statistik</a></li>
                                        <li><a href="#">Layanan<i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a class="page-scroll" href="{{route('layanan.create')}}">Tambah Layanan</a>
                                                </li>
                                                <li>
                                                    <a class="page-scroll" href="{{route('layanan.index')}}">List
                                                        Layanan</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ url('/logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                          style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->
<!-- start slider Section -->


<!-- start about Section -->
@if(Auth::guest()==false)
    <section id="tm_sec">
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                    <div class="title_sec">
                        <h1>EDIT PELANGGAN</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="title_sec col-lg-4 col-md-4 col-sm-12">
                    <div id="cnt_form">

                        {!! Form::model($pelanggan, ['url' => route('pelanggan.update', $pelanggan->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
                        <div class="form-group">
                            {!! $errors->first('nama', '<p class="help-block">Maksimal 50 Karakter</p>') !!}
                            <input type="text" maxlength="50" name="nama" class="form-control name-field"
                                   required="required"
                                   value="{{$pelanggan->nama_Pelanggan}}">
                        </div>

                        <div class="form-group">
                            {!! $errors->first('cp', '<p class="help-block">Maksimal 50 Karakter</p>') !!}
                            <input type="cp" maxlength="50" name="cp" class="form-control name-field"
                                   value="{{$pelanggan->nama_Cp}}" data-toggle="tooltip" title="Nama CP">
                        </div>

                        <div class="form-group">
                            <input type="text" name="nope" maxlength="13" class="form-control name-field"
                                   required="required"
                                   value="{{$pelanggan->no_Hp}}">
                            {!! $errors->first('nope', '<p class="help-block">Nomor HP Harus Berupa Angka<br>
                            Maksimal 13 Digit, Minimal 9 Digit</br></p>') !!}
                        </div>

                        <div class="form-group">
                            <input type="text" name="tlp" maxlength="12" class="form-control name-field"
                                   value="{{$pelanggan->no_Telepon}}" data-toggle="tooltip" title="Nomor Telepon">
                            {!! $errors->first('nope', '<p class="help-block">Nomor Telepon Harus Berupa Angka<br>
                            Maksimal 12 Digit</br></p>') !!}
                        </div>

                        <div class="form-group">
                            {!! $errors->first('alamat', '<p class="help-block">Maksimal 100 Karakter</p>') !!}
                            <textarea maxlength="100" class="form-control" id="message" name="alamat"
                                      required="required"
                            >{{$pelanggan->alamat_Pelanggan}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        {{--@include('am._form')--}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- End contact us  Section -->
<!-- start footer Section -->
<footer id="ft_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="copy_right">
                    <li>&copy;PKL MAHO 2016</li>
                    <li>developed by Razak, Dhian, & Dewangga</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Section -->
<!-- End footer Section -->
{{--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>--}}
{{--<script src="js/vendor/jquery-1.11.2.min.js"></script>--}}
{!! Html::script('http://code.jquery.com/jquery-1.9.1.min.js') !!}
{!! Html::script('js/vendor/jquery-1.11.2.min.js') !!}
{!! Html::script('js/isotope.pkgd.min.js') !!}
{{--<script src="js/isotope.pkgd.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/jquery-ui.js"></script>--}}
{{--<script src="js/appear.js"></script>--}}
{{--<script src="js/jquery.counterup.min.js"></script>--}}
{{--{!! Html::script('js/bootstrap.min.js') !!}--}}
{!! Html::script('js/jquery-ui.js') !!}
{!! Html::script('js/appear.js') !!}
{!! Html::script('js/jquery.counterup.min.js') !!}
{!! Html::script('js/waypoints.min.js') !!}
{!! Html::script('js/owl.carousel.min.js') !!}
{!! Html::script('js/showHide.js') !!}
{!! Html::script('js/jquery.nicescroll.min.js') !!}
{!! Html::script('js/jquery.easing.min.js') !!}
{!! Html::script('js/scrolling-nav.js') !!}
{!! Html::script('js/plugins.js') !!}
{!! Html::script('https://maps.googleapis.com/maps/api/js') !!}
{{--<script src="js/waypoints.min.js"></script>--}}
{{--<script src="js/owl.carousel.min.js"></script>--}}
{{--<script src="js/showHide.js"></script>--}}
{{--<script src="js/jquery.nicescroll.min.js"></script>--}}
{{--<script src="js/jquery.easing.min.js"></script>--}}
{{--<script src="js/scrolling-nav.js"></script>--}}
{{--<script src="js/plugins.js"></script>--}}
<!-- Google Map js -->
{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}
<script>
    function initialize() {
        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: new google.maps.LatLng(41.092586000000000000, -75.592688599999970000)
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation: google.maps.Animation.BOUNCE,
            icon: 'img/map-marker.png',
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
{{--<script src="js/main.js"></script>--}}
{!! Html::script('js/main.js') !!}
{{--<script src="showHide.js" type="text/javascript"></script>--}}
{!! Html::script('showHide.js') !!}

<script type="text/javascript">

    $(document).ready(function () {


        $('.show_hide').showHide({
            speed: 1000,  // speed you want the toggle to happen
            easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
            changeText: 1, // if you dont want the button text to change, set this to 0
            showText: 'View',// the button text to show when a div is closed
            hideText: 'Close' // the button text to show when a div is open

        });


    });

</script>
<script>
    jQuery(document).ready(function ($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script>

    //Hide Overflow of Body on DOM Ready //
    $(document).ready(function () {
        $("body").css("overflow", "hidden");
    });

    // Show Overflow of Body when Everything has Loaded
    $(window).load(function () {
        $("body").css("overflow", "visible");
        var nice = $('html').niceScroll({
            cursorborder: "5",
            cursorcolor: "#00AFF0",
            cursorwidth: "3px",
            boxzoom: true,
            autohidemode: true
        });

    });
</script>
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--$('#html').DataTable({--}}
{{--"order": [[3, "desc"]]--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
</body>
</html>

