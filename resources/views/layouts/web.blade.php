<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','首页') | {{ config('app.name', 'Laravel') }} </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('home')}}" class="site_title"><i class="fa fa-paw"></i> <span>{{ config('app.name', 'Laravel') }}</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ asset('images/img.jpg') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>欢迎光临,</span>
                        <h2>{{ Auth()->user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                @include('layouts.menu')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    {{--<a data-toggle="tooltip" data-placement="top" title="Settings">--}}
                        {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
                        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
                        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    <a style="width: 100%;" data-toggle="tooltip" data-placement="top" title="退出" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        @include('layouts.navigation')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @include('layouts.info')
                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                {{--财务系统--}}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>

@yield('js')
</body>
</html>