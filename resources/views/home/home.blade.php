@extends('layouts.app')

@section('content')
        <!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Celende.css') }}">
</head>
<style>
    .bodd{
        background:black url(img/183850434.jpg);
        background-position: center;
        background-size:contain;
        background-repeat:no-repeat;
        background-attachment: fixed;
    }
    .tit{
        color:#fff !important;
        font-weight:400;
    }
    .center{
        
        text-align:center;
    }
    .leftt{
        text-align:left;
    }
    .rightt{
        text-align:right;
    }
</style>
<body >
    <div id="app"  class="landing-page no-skin-config bodd">
        <div id="features" class="container" 
        style="margin: 6% auto;margin-top: -1%;width: 100%;position:center;">
            <div class="row col-lg-6">
                <div class="col-sm-8">
                    <h2 class="tit center">Temiz Kortlar</h2>
                    <p class="tit leftt">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

                </div>
                <div class="col-sm-8">
                    <h2 class="tit center">Servis Araçları</h2>
                    <p class="tit rightt">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
            </div>
            <div class="row col-lg-6">
                <div class="col-sm-8">
                    <h2 class="tit leftt">Kıyafet Kiralama</h2>
                    <p class="tit leftt">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
                <div class="col-sm-8">
                    <h2 class="tit rightt">Çeşitli Kortlar</h2>
                    <p class="tit rightt ">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
                </div>
            </div>
        </div>
        <div class="navy-line"></div>    
        <section class="container features" >
            <div class="row ">
                <div class="col-md-9 panel" style="margin-left:13%;">
                    <div class="">
                        <div class="ibox-title text-center">
                                <h1 >Kortunuzu Rezerv Ediniz</h1>
                                <p >Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
                        </div>
                        <div class="ibox-content" id="rezerv">
                            <form action="{{ route('rezervasyon.store') }}" method="post">
                                @csrf
                                @guest
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Adınız ve Soyadınız</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="isim" v-model="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Telefon Numaranız</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telefon" />
                                    </div>
                                </div>
                                @endguest
                                <div class="form-group row">
                                    <div class="col-md-6" >
                                        <label class="col-sm-8 control-label">Servis istiyor musunuz</label>
                                        <div class="col-sm-4">
                                            <input type="checkbox" class="control-label" name="servis" v-model="servis"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6" v-if="servis">
                                        <label class="col-sm-2 control-label" style="color:white">Adres</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="servis_adresi" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Kort Seç</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kort_id" id="kort">
                                            @foreach($kortlar as $kort)
                                                <option value="{{ $kort->id  }}">{{ $kort->isim}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-md-6">
                                        <input type="text" name="tarih" id="tarih" readonly class="form-control" placeholder="Bir tarih seçmek için Tikla ">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="saat" id="saat" readonly class="form-control"  placeholder="Tarih seçtikten sonra bir saat seç">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-md-6 col-xs-offset-3 text-center">
                                        <button type="submit"  value="rezerv et" v-if="true" class="btn btn-primary">
                                                Rezerv et
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div id="calendarContainer"  class="col-md-6"></div>
                <div id="organizerContainer" class="col-md-6"></div>
            </div>
        </section>
        
        <section id="contact" style="margin-top:4%;" class="text-center container">
            <div class="col-sm-10 col-xs-offset-1 ibox-content ">
                <h1 class="panel-heading " style="color:black;">
                    Contact Us
                </h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
            </div>
            <div class="col-lg-8 col-xs-offset-2 ibox-content">
                <div class="col-lg-5">
                    <address>
                        <strong>
                            <span class="navy">Company name, Inc.</span>
                        </strong><br />
                        <span style="color:black;">795 Folsom Ave, Suite 600</span><br>
                            <span style="color:black;"> San Francisco, CA 94107</span><br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-lg-7">
                    <p class="text-color">
                        Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="{{ route('contacts') }}" 
                        class="btn btn-primary">Send us mail</a>
                        <p class="m-t-sm">
                            Or follow us on social platform
                        </p>
                        <ul class="list-inline social-icon">
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                        <p>
                            <strong>&copy; 2015 Company Name</strong>
                            <br /> consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @include('_includes.scripts.home_footer')
</body>
</html>

@endsection
