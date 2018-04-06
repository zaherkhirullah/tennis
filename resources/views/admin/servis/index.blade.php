@extends('layouts.admin')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
      <h2>Servisler Listesi</h2>
      <ol class="breadcrumb">
          <li>
              <a href="index.html">Home</a>
          </li>
          <li>
              <a>Servisler</a>
          </li>
          <li class="active">
              @if(Route::is('servis.index'))
              <strong>  Servisler listesi  </strong>
            @elseif(Route::is('servis.silindi'))
              <strong>  gizli Servisler listesi  </strong>            
            @endif 
          </li>
      </ol>
  </div>
  <div class="col-lg-2">
      <a href="{{ route('servis.create') }}" class="btn btn-primary" style="margin-top:15%">Yeni Servis Ekle</a>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    @if(count($servisler))
     @foreach ($servisler as $servis)
      <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="ibox">
              <div class="ibox-content product-box">

              <div class="product-imitation" style="background:no-repeat ;background-image:url('{{  asset('assets/ServisList.jpg') }}');max-width:100%;max-height:100%;">
                  </div>
                  <div class="product-desc">
                    @if( $servis->durum == 0)
                        <small class="text-muted">Servis Durumu 
                            <b class="text-success">Çalisir</b>
                        </small>
                    @elseif( $servis->durum == 1)
                      <small class="text-muted">Servis Durumu
                          <b class="text-info">Meşgül</b>
                      </small>
                    @else
                    <small class="text-muted">Servis Durumu
                        <b class="text-danger">Arzali</b>
                    </small>
                  @endif
                   
                      <a href="#" class="product-name">{{ $servis->isim  }} </a>
                      <div class="small m-t-xs">
                          Plaka numarasi <b class="text-info"> {{ $servis->plaka  }}</b>
                          <br>
                          Şöför adi <b class="text-info"> {{ $servis->sofor_adi  }}</b>
                          <br>
                          Şöför numarasi <b class="text-info"> {{ $servis->sofor_numarasi  }}</b>
                      </div>
                      <div class="m-t text-left">
                            <a href="{{ route('servis.rezervasyonlar',$servis->id) }}" class="btn btn-xs btn-outline btn-primary">
                              Rezervasyonları 
                              <span class="hidden-sm hidden-xs"> Görüntle</span>
                              <i class="fa fa-long-arrow-right"></i>
                           </a>
                        </div>
                        <div class="form-group" style="margin-bottom:15%">
                          @if( $servis->durum == 0)
                          <div class="m-t  col-md-4 col-sm-4 col-xs-4">                                                   
                              <a href="{{ route('servis.tamir',$servis->id) }}" class="btn btn-xs btn-outline btn-danger">
                                  <span class="hidden-sm hidden-xs">Tamir</span>
                                   <i class="fa fa-long-arrow-right"></i> 
                              </a>
                          </div>
                          <div class="m-t col-md-4 col-sm-4 col-xs-4">
                              <a href="{{ route('servis.mesgul',$servis->id) }}" class="btn btn-xs btn-outline btn-info">
                                      <span class="hidden-sm hidden-xs">  Meşgul</span>
                                       <i class="fa fa-long-arrow-right"></i> 
                              </a>
                          </div>
                          @else
                          <div class="m-t col-md-4 col-sm-4 col-xs-4">                        
                              <a href="{{ route('servis.calistir',$servis->id) }}" class="btn btn-xs btn-outline btn-success">
                                      <span class="hidden-sm hidden-xs">Çalistir </span>
                                       <i class="fa fa-long-arrow-right"></i> 
                              </a>
                          </div>
                         @endif
                         <div class="m-t text-right col-md-4 col-sm-4 col-xs-4">
                              <a href="{{ route('servis.edit',$servis->id) }}" class="btn btn-xs btn-outline btn-warning">
                                  <span class="hidden-sm hidden-xs"> Düzenle </span>
                                  <i class="fa fa-edit"></i> </a>
                          </div>
                        </div>
                  </div>
              </div>
          </div>
      </div>
     @endforeach
    @else
      <div class="col-md-8 col-md-offset-2">
        <center> 
            @if(Route::is('servis.index'))
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.servisler')</h2>
            @else
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.hidden_servisler')</h2>
            @endif
        </center>
      </div>
      @if(Route::is('servis.index'))
        <div class="text-clear col-md-12">  </div>
        <div class="col-md-12 text-center">
            <a href="{{route('servis.create')}}" class="btn btn-success"> 
            <i class="fa fa-plus"></i>  @lang('lang.click_to') @lang('lang.add')  @lang('lang.new_servis') 
            </a>
        </div>
      @endif 
    @endif 
    
  </div>
</div>

  @endsection
