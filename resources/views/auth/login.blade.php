<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">

        <div class="animate form login_form">

            @if ($errors->has('name'))
                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    {{ $errors->first('name') }}
                </div>
            @endif
                @if ($errors->has('password'))
                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('password') }}
                    </div>
                @endif
            <section class="login_content">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h1>登录</h1>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="账号" required="" />
                    </div>
                    <div>
                        <input type="password"  name="password" class="form-control" placeholder="密码" required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">
                            登录
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    {{--<div class="separator">--}}
                        {{--<p class="change_link">New to site?--}}
                            {{--<a href="#signup" class="to_register"> Create Account </a>--}}
                        {{--</p>--}}

                        {{--<div class="clearfix"></div>--}}
                        {{--<br />--}}

                        {{--<div>--}}
                            {{--<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>--}}
                            {{--<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
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
</body>
</html>
