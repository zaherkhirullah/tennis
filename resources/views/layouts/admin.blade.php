
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">    
   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>

 <!-- Bootstrap 3.3.7 -->
  <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" /> 
  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> 
  <!-- Theme style -->
  <link href="{{ asset('/bower_components/admin-lte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('/bower_components/admin-lte/dist/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">  --}}

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    @include('_includes.layout_partials.header')

    <!-- Sidebar -->
    @include('_includes.layout_partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            {{--  {{ Breadcrumbs::render('') }}  --}}
            {{--  {{ Breadcrumbs::render('continent', $continent) }}  --}}
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">
                        {{trans('lang.welcome')}}
                    </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('_includes.partials.flash_message')
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!-- Footer -->
    @include('_includes.layout_partials.footer')
    @include('_includes.layout_partials.settings')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('/bower_components/admin-lteplugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('/bower_components/admin-lteplugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/bower_components/admin-lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/bower_components/admin-ltedist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/bower_components/admin-ltedist/js/demo.js')}}"></script>


{{--  


<!-- jQuery 2.2.3 -->
  <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

<!-- Bootstrap 3.3.2 JS -->
  <script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset ("js/app.js") }}" type="text/javascript"></script>
    
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="{{ asset('/bower_components/morris/morris.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('/bower_components/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- jvectormap -->
  <script src="{{ asset('/bower_components/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('/bower_components/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- DataTables -->
 <script src="{{ asset('/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('/bower_components/datatables/dataTables.bootstrap.min.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('/bower_components/knob/jquery.knob.js') }}"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ asset('/bower_components/daterangepicker/daterangepicker.js') }}"></script>
  <!-- datepicker -->
  <script src="{{ asset('/bower_components/datepicker/bootstrap-datepicker.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('/bower_components/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('/bower_components/fastclick/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/bower_components/admin-lte/dist/js/app.min.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('/bower_components/admin-lte/dist/js/pages/dashboard.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/bower_components/admin-lte/dist/js/demo.js') }}"></script>
   --}}
</body>
</html>