@extends('layouts.app')

@section('content')
    <div class="col-md-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Profile Detail</h5>
            </div>
            <div>
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-responsive" src="{{ asset('assets/profil.jpg') }} ">
                </div>
                <div class="ibox-content profile-content">
                    <h4><strong>{{ Auth::user()->isim }}</strong></h4>
                    <p><i class="fa fa-map-marker"></i> {{ Auth::user()->adres }}</p>
                    <h5>
                        Hakkımda bilgiler
                    </h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                    </p>
                    <div class="row m-t-lg">
                        <div class="col-md-4">
                            <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                            <h5><strong>169</strong> Puan</h5>
                        </div>
                        <div class="col-md-4">
                            <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                            <h5><strong>28</strong> Saatler</h5>
                        </div>
                    </div>
                    <div class="user-button">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                            class="fa fa-envelope"></i> Yeni Rezerve
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Aktivitelerim</h5>
            </div>
            <div class="ibox-content">

                <div>
                    <div class="feed-activity-list">
                        @if(count($rezervasyonlar))
                            @foreach($rezervasyonlar as $rez)
                                <div class="feed-element">
                                    <div class="media-body ">
                                        @if($rez->suan())
                                            <small class="pull-right text-navy">Şuan</small>
                                            <div class="actions">
                                                    @if($rez->uzatabilir() )
                                                        <a href="{{ route('rezervasyon.uzatma',$rez) }}" class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Uzatma</a>
                                                    @else
                                                        @if((!$rez->sonraki_oyun()) && !$rez->bekleyen())
                                                            <a href="{{ route('rezervasyon.bekleme',$rez) }}" class="btn btn-xs btn-warning"><i class="fa fa-heart"></i> Bekleme listesine ekle</a>
                                                        @endif
                                                    @endif
        
                                                </div>
                                            @else
                                            @if( $rez->baslangis > now())
                                            <small class="pull-right text-navy">
                                                <form action="{{ route('rezervasyon.destroy',$rez) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-trash">iptal</i></button>
                                                </form>
                                            </small>
                                            @endif
                                            <small class="pull-right text-navy">{{ $rez->baslangis }}</small>
                                        @endif
                                        <strong>{{ $rez->kort->isim }}</strong> Kiraladınız. Süre <strong>1
                                            saat</strong> boyunca. <br>
                                        <small class="text-muted"></small>
                                      
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>@endsection