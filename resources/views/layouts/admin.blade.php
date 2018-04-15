
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">    
   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
    <title>{{ $page_title or "TennisClub | Servisler Listesi"  }}</title>
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"  type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" type="text/css">

</head>
<body>
<style>
    .left-ust{
     margin-top:-90px;
     left:0;
     float:right;
 }
 .pad5{
     padding :5px;
 }
 #de_trash{
     display: none;
     transition: all .3s;
 }
 .product-imitation:hover #de_trash{
     display: block;
     transition: all .3s;
 }
</style>
<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                        <img alt="image" class="img-circle" src="{{asset('assets/img/profile_small.jpg') }} " />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{ Auth::user()->isim }}</strong>
                                </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <b  class="text-danger"> 
                                        <i class="fa fa-sign-out"> </i> 
                                    @lang('lang.logout')
                                </b>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="{{ route('kort.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Kortlar</span></a>
                </li>
                <li>
                    <a href="{{ route('servis.index') }}"><i class="fa fa-bus"></i> <span class="nav-label">Servis Araçları</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar-o"></i> <span class="nav-label">Rezervasyonlar</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('rezervasyon.simdiki') }}">Şimdiki Rezervasyonlar</a></li>
                        <li><a href="{{ route('rezervasyon.sonraki') }}">Sonraki Rezervasyon</a></li>
                        <li><a href="{{ route('rezervasyon.index') }}">Tüm Rezervasyonlar</a></li>
                        <li><a href="{{ route('rezervasyon.gecmis') }}">Geçmiş Rezervasyonlar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('kiralayan.index') }}">
                        <i class="fa fa-th-large"></i>
                        <span class="nav-label">Kiralayanlar</span>
                    </a>


                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-calendar-o"></i>
                        <span class="nav-label">Iletişim Mesajları</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="{{ route('contacts.index') }}">Yeni Mesajlari</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts.all_deleted') }}">Cevabı verilmiş Mesajlari</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        @include('_includes.layout_partials.hed')
        @include('_includes.partials.flash_message')
        <!-- Your Page Content Here -->
        @yield('content')
        
        <div class="footer">
  
            <div>
                <strong>Copyright</strong> Scorpion Team &copy; 2018
            </div>
          </div>
    </div>
</div>


@include('_includes.scripts.admin_footer')

</body>
</html>