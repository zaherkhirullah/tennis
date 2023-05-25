@extends('layouts.app')

@section('content')
  {{-- <div class="col-md-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Profile Detail</h5>
        </div>
        <div>
            <div class="ibox-content no-padding border-left-right">
                <img alt="image" class="img-responsive" src="{{ asset('assets/profil.jpg') }} ">
            </div>
            <div class="ibox-content profile-content">
                <h4><strong>{{ Auth::user()->name }}</strong></h4>
                <p><i class="fa fa-map-marker"></i> {{ Auth::user()->adres }}</p>
                <h5>
                    Hakkımda bilgiler
                </h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                </p>
                <div class="row m-t-lg">
                    <div class="col-md-4">
                        <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                        <h5><strong>169</strong> Puan</h5>
                    </div>
                    <div class="col-md-4">
                        <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                        <h5><strong>28</strong> hourler</h5>
                    </div>
                </div>
                <div class="user-button">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Yeni Rezerve</button>
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

                    <div class="feed-element">
                        <div class="media-body ">
                            <small class="pull-right text-navy">Şuan</small>
                            <strong>Kort Adi</strong> Kiraladınız. Süre <strong>2 hour</strong> boyunca. <br>
                            <small class="text-muted">Çarşamba 4:21 pm - 12.06.2014</small>
                            <div class="actions">
                                <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Uzatma</a>
                            </div>
                        </div>
                    </div>
                    <div class="feed-element">
                        <div class="media-body ">
                            <small class="pull-right text-navy">2 gün önce</small>
                            <strong>Kort Adi</strong> Kiraladınız. Süre <strong>2 hour</strong> boyunca. <br>
                            <small class="text-muted">Çarşamba 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>
                    <div class="feed-element">
                        <div class="media-body ">
                            <small class="pull-right text-navy">2 gün önce</small>
                            <strong>Kort Adi</strong> Kiraladınız. Süre <strong>2 hour</strong> boyunca. <br>
                            <small class="text-muted">Çarşamba 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>
                    <div class="feed-element">
                        <div class="media-body ">
                            <small class="pull-right text-navy">2 gün önce</small>
                            <strong>Kort Adi</strong> Kiraladınız. Süre <strong>2 hour</strong> boyunca. <br>
                            <small class="text-muted">Çarşamba 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>
                    <div class="feed-element">
                        <div class="media-body ">
                            <small class="pull-right text-navy">2 gün önce</small>
                            <strong>Kort Adi</strong> Kiraladınız. Süre <strong>2 hour</strong> boyunca. <br>
                            <small class="text-muted">Çarşamba 4:21 pm - 12.06.2014</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </div> --}}
@endsection