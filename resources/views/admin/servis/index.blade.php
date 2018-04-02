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
                      <a href="{{ route('servis.rezervasyonlar',$servis->id) }}" class="m-t btn btn-xs btn-outline btn-primary">
                            Rezervasyonları Görüntle<i class="fa fa-long-arrow-right"></i> 
                          </a>
                          <div class="form-group" style="margin-bottom:15%">            
                        <div class="m-t text-left col-md-4 col-sm-6 col-xs-6">                          
                          @if( $servis->durum == 0)
                              <a href="{{ route('servis.tamir',$servis->id) }}" class="btn btn-xs btn-outline btn-danger">
                                Tamir <i class="fa fa-long-arrow-right"></i> 
                              </a>
                        @else
                            <a href="{{ route('servis.calistir',$servis->id) }}" class="btn btn-xs btn-outline btn-success">
                              Çalisti <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        @endif
                        </div>
                          <div class="m-t text-right col-md-5 col-xs-6 col-sm-6">
                              <a href="{{ route('servis.edit',$servis->id) }}" class="btn btn-xs btn-outline btn-warning">
                                Düzenle<i class="fa fa-long-arrow-right"></i>
                               </a>
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
