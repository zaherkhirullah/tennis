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
                    <h4><strong>{{ Auth::user()->kiralayan->isim }}</strong></h4>
                    @if(Auth::user()->kiralayan->adres)
                    <p><i class="fa fa-map-marker"></i> {{ Auth::user()->kiralayan->adres }}</p>
                    @else
                    <p><i class="fa fa-map-marker"></i>  Sakarya </p>
                    @endif
                    <h5>
                        Hakkımda bilgiler
                    </h5>
                    
                    <div class="user-button">
                        <div class="row">
                            <div class="col-md-6">
                                    <a href="/home#rezerv" class="btn btn-primary btn-sm btn-block"><i
                                        class="fa fa-envelope"></i> Yeni Rezerve
                            </a>
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
                <h5>  
                    <span class="pull-right">
                        <a href="/home#rezerv" class="label label-primary">
                            <i class="fa fa-plus"></i> Yeni Rezervasyon
                        </a>
                    </span>
                        Aktivitelerim
                </h5>
            </div>
            <div class="ibox-content">
            
                <div>
                    <div class="feed-activity-list">
                        @if(count($rezervasyonlar))
                            @foreach($rezervasyonlar as $rez)
                                <div class="feed-element">
                                    <div class="media-body ">
                                        @if($rez->suan())
                                            <small class="pull-right ">Şuan</small>
                                            @else
                                            @if( $rez->baslangis > now())
                                            <small class="pull-right">
                                                <form action="{{ route('rezervasyon.destroy',$rez) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i> Iptal
                                                    </button>
                                                </form>
                                            </small>
                                            @endif
                                            <small class="pull-right btn-sm label-info">{{ $rez->baslangis }}</small>
                                        @endif
                                        <strong>{{ $rez->kort->isim }}</strong> Kiraladınız. Süre <strong>1
                                            saat</strong> boyunca. <br>
                                        <small class="text-muted"></small>
                                        <div class="actions pull-right">
                                            @if($rez->suan() && $rez->uzatabilir() )
                                                <a href="{{ route('rezervasyon.uzatma',$rez) }}" class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Uzatma</a>
                                            @else
                                                @if($rez->suan() &&  (!$rez->sonraki_oyun()) && !$rez->bekleyen())
                                                    <a href="{{ route('rezervasyon.bekleme',$rez) }}" class="btn btn-xs btn-warning"><i class="fa fa-heart"></i> Bekleme listesine ekle</a>
                                                @endif
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="well well-sm">
                            <h3 class="text-danger">Her hangi bir rezervasyon bulunmadi .... </h3>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>@endsection