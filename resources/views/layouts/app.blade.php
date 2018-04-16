<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{asset('assets/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css') }} " rel="stylesheet">
    <link href="{{asset('assets/css/animate.css') }} " rel="stylesheet">
    <link href="{{asset('assets/css/style.css') }} " rel="stylesheet">

</head>
<body id="page-top" class="landing-page no-skin-config" style="background-image:url('{{ asset('assets/183850434.jpg') }} '); background-size:inherit;">
    <div class="navbar-wrapper" style="background-color:darkgreen">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href=" {{ route('home') }} ">AnaSayfa</a></li>
                        <li><a class="page-scroll" href=" {{ route('aboutUs') }} ">Hakkımızda</a></li>
                        <li><a class="page-scroll" href=" {{ route('contacts') }} ">İletişim</a></li>
                        <li><a class="page-scroll" href=" {{ route('home') }}#rezerv">Rezervasyon</a></li>
                            @include('_includes.partials.auth')
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="margin:5%;">
        <div style="margin-left:0;" class="row wrapper border-bottom white-bg page-heading col-lg-12">
            <div class="col-lg-10">
                <h2><b>Profile</b></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{  route('home') }} ">Tennis Club</a>
                    </li>
                    <li>
                            <a href="{{route('home') }} ">AnaSayfa</a>
                    </li>
                    <li class="active">
                        <strong>Page Title</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content col-lg-12" style="width:100%">
            <div class="row animated fadeInRight">
                <div class="col-lg-12">
                    {{--   error or success flash ssession messages         --}}
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <center> 
                            {{ session('success') }}
                        </center>
                        </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <center>  
                                {{ session('error') }}
                            </center>
                         </div>
                    @endif
                @yield('content')
                </div>
            </div>
        </div>
 
    </div>
    
    <!-- Mainly scripts -->
    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }} "></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/js/inspinia.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/wow/wow.min.js') }} "></script>
  <!-- JSKnob -->
    <script src="{{ asset('assets/js/plugins/jsKnob/jquery.knob.js') }} "></script>
    <!-- Input Mask-->
    <script src="{{ asset('assets/js/plugins/jasny/jasny-bootstrap.min.js') }} "></script>
    <!-- Data picker -->
    <script src="{{ asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }} "></script>
    <!-- MENU -->
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }} "></script>
    <!-- Clock picker -->
    <script src="{{ asset('assets/js/plugins/clockpicker/clockpicker.js') }} "></script>
    <!-- Date range use moment.js') }}  same as full calendar plugin -->
    <script src="{{ asset('assets/js/plugins/fullcalendar/moment.min.js') }} "></script>
    <!-- Date range picker -->
    <script src="{{ asset('assets/js/plugins/daterangepicker/daterangepicker.js') }} "></script>

    <script>

        $(document).ready(function(){
            $('body').scrollspy({
                target: '.navbar-fixed-top',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
           
            $('.clockpicker').clockpicker({
                default: 'now',
                fromnow:0,
            });
            $('.clockpicker').clockpicker('toggleView', 'hours');
            $('#data_2 .input-group.date').datepicker({
                startView: 3,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy",
            });
            $('#data_2 .input-group.date').datepicker("setDate", new Date());

        });
        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                    header = document.querySelector( '.navbar-default' ),
                    didScroll = false,
                    changeHeaderOn = 25;
            function init() {
                window.addEventListener( 'scroll', function( event ) {
                    if( !didScroll ) {
                        didScroll = true;
                        setTimeout( scrollPage, 250 );
                    }
                }, false );
            }
            function scrollPage() {
                var sy = scrollY();
                if ( sy >= changeHeaderOn ) {
                    $(header).addClass('navbar-scroll')
                }
                else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }
            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();
        // Activate WOW.js') }}  plugin for animation on scrol
        new WOW().init();
        $('.chosen-select').chosen({width: "100%"});
        $(".dial").knob();

    </script>
</body>

</html>
