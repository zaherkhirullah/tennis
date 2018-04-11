@extends('layouts.app')

@section('content')

<style>
    .bag{
        background:#fff;
        padding: 5px;
        border:1px solid;
        border-radius: 5px;
    }
</style>
<div class="container">
    <div id="features" class="container">
        <div class="row ">
            <div class="col-sm-3 bag">
                <h2 style="color:#1ab394 !important;font-weight:400">Servislerimiz 1</h2>
                <p style="color:#1ab394 !important;font-weight:400">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
            <div class="col-sm-3 bag">
                <h2 style="color:#1ab394 !important;font-weight:400">Servislerimiz 2</h2>
                <p style="color:#1ab394 !important;font-weight:400">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

            </div>
            <div class="col-sm-3 bag">
                <h2 style="color:#1ab394 !important;font-weight:400">Servislerimiz 3</h2>
                <p style="color:#1ab394 !important;font-weight:400">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>

            </div>
            <div class="col-sm-3 bag">
                <h2 style="color:#1ab394 !important;font-weight:400">Servislerimiz 4</h2>
                <p style="color:#1ab394 !important;font-weight:400">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
        </div>
    </div>
    
    <div class="item">
        <video class="header-back one"  style="max-height:400px;" controls="controls" >
            <source src="{{ asset('assets/Martin Solveig.MKV') }}" type="video/mp4">
        </video>
    </div>
   
    <section class="container features ibox-content ">
            <div class="text-center">
                <h1>Kortunuzu Rezerv Ediniz</h1>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>
            </div>            
            <form action="{{ route('rezervasyon.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @guest
                        <div class="form-group">
                            <label for="isim" class="col-sm-2 control-label">isim</label>
                            <div class="col-sm-10">
                                <input type="text" name="isim" id="isim" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="isim" class="col-sm-2 control-label">Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" name="telefon" id="telefon" class="form-control">
                            </div>
                        </div>
                    @endguest
                    <div class="form-group">
                        <label for="isim" class="col-sm-2 control-label">Kort</label>
                        <div class="col-sm-10">
                            <select name="kort_id" id="kort_id" class="form-control">
                                @foreach($kortlar as $kort)
                                    <option value="{{ $kort->id }}">{{ $kort->isim }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adres" class="col-sm-2 control-label">Adres</label>
                        <div class="col-sm-10">
                            <input type="text" name="adres" id="adres" class="form-control">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Tarihi Seçiniz</label>
                        <div class="col-sm-10" id="data_2">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="tarih" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Saati Seçiniz</label>
                        <div class="col-sm-10">
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="baslangis" class="form-control">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                            </div>
                        </div>
                    </div>  
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            {{-- <form method="" class="form-horizontal">
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Adınız ve Soyadınız</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Telefon Numaranız</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Kort Seç</label>
                        <div class="col-sm-10">
                            <select class="form-control m-b" name="account">
                                <option>Seç</option>
                                <option>Tekli</option>
                                <option>Çift</option>
                                <option>vs</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Tarihi Seçiniz</label>
                        <div class="col-sm-10" id="data_2">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color:white">Saati Seçiniz</label>
                        <div class="col-sm-10">
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form> --}}
    </section>
    
    
    <section id="contact" class="">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Contact Us</h1>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                </div>
            </div>
            <div class="row m-b-lg">
                <div class="col-lg-3 col-lg-offset-3">
                    <address>
                        <strong><span class="navy">Company name, Inc.</span></strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-lg-4">
                    <p class="text-color">
                        Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis, totam corporis ea,
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
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
@endsection
