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