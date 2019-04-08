<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->

    <head>
        <title>SIAAUIET</title>
        <!--[if IE]>
            <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/>
        <![endif]-->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Sistema Integral Académico Administrativo UIET" name="description"/>
        <meta content="Francisco Gabriel Alvarez Alcaraz" name="author"/>

        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/themify-icons/themify-icons.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/flag-icon-css/css/flag-icon.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/animate.css/animate.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/switchery/dist/switchery.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/ladda/dist/ladda-themeless.min.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/slick.js/slick/slick.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/slick.js/slick/slick-theme.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css?v=4') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css?v=1') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/themes/lyt1-theme-1.css?v=1') }}" id="skin_color">
        <link rel="shortcut icon" href="{{ asset('favicon.ico?v=1') }}"/>
    </head>

    <body class="login">

        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">
                <div class="logo text-center">
                    <img src="{{ asset('assets/images/logos/UIET.png?v=1') }}" alt="SIAAUIET" class="img-responsive"/>
                </div>
                <p class="text-center text-dark text-bold text-extra-large margin-top-15">
                    SIAAUIET
                </p>
                <p class="text-center">
                    Sistema Integral Académico Administrativo UIET
                </p>
                <p class="text-center">

                </p>

                <div class="box-login">
					<form class="form-login" method="POST" action="{{ url('/Login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="TeUsuario" placeholder="Frank">
                        </div>
                        <div class="form-group form-actions">
                            <input type="password" class="form-control password" name="PaContrasena" placeholder="******">
                        </div>
                        <div class="text-center">
                            <a href="login_forgot.html"> Olvidó su contraseña?</a>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-red btn-block">
                                Entrar
                            </button>

                        </div>

                    </form>

                    <div class="copyright">
                        2019 &copy; UIET
                    </div>

                </div>

            </div>
        </div>

        <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/components-modernizr/modernizr.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/js-cookie/src/js.cookie.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/jquery-fullscreen/jquery.fullscreen-min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/switchery/dist/switchery.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/jquery.knobe/dist/jquery.knob.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/slick.js/slick/slick.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/jquery-numerator/jquery-numerator.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/ladda/dist/spin.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/ladda/dist/ladda.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/ladda/dist/ladda.jquery.min.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/ckeditor/ckeditor.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/ckeditor/adapters/jquery.js?v=1') }}"></script>
        <script src="{{ asset('/bower_components/bb-jquery-validation/dist/jquery.validate.js?v=1') }}"></script>
        <script src="{{ asset('assets/js/letter-icons.js?v=1') }}"></script>
        <script src="{{ asset('assets/js/main.js?v=1') }}"></script>
        <script src="{{ asset('assets/js/login.js?v=1') }}"></script>

        <script>
            jQuery(document).ready(function () {
                Main.init();
                Login.init();
            });
        </script>

    </body>
</html>





