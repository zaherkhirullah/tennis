@extends('layouts.admin')
@section('content')

{{-- <div class="row wrapper border-bottom white-bg page-heading">
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
              @if(Route::is('service.index'))
              <strong>  Servisler listesi  </strong>
            @elseif(Route::is('service.allDeleted'))
              <strong>  gizli Servisler listesi  </strong>            
            @endif 
          </li>
      </ol>
  </div>
  <div class="col-lg-2">
      <a href="{{ route('service.create') }}" class="btn btn-primary" style="margin-top:15%">Yeni Servis Ekle</a>
  </div>
</div> --}}
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>services Listesi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>services</a>
                </li>
                <li class="active">
                  @if(Route::is('service.index'))
                    <b>  services Listesi  </b>
                  @elseif(Route::is('service.allDeleted'))
                    <b>  gizli services listesi  </b>
                  @endif
                </li>
            </ol>
        </div>
        <div class="col-lg-4" style="margin-top:3%">
            <a href="{{ route('service.create') }}" class="btn btn-primary" ><i class="fa fa-plus"></i> Ekle</a>
            @if(Route::is('service.index'))
            <a href="{{ route('service.allDeleted') }}" class="btn btn-danger" ><i class="fa fa-trash"></i> Silinen göster </a>
          @elseif(Route::is('service.allDeleted'))
          <a href="{{ route('service.index') }}" class="btn btn-success" ><i class="fa fa-check"></i> Activeler göster </a>
          @endif
        </div>
    </div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    @if($services)
     @foreach ($services as $service)
      <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="ibox">
              <div class="ibox-content product-box">

              <div class="product-imitation" style="background:no-repeat ;background-image:url('{{  asset('assets/ServisList.jpg') }}');max-width:100%;max-height:100%;">
                <span class="left-ust white-bg pad5" id="de_trash"> 
                  
                    @if(Route::is('service.index'))
                    <a href="{{ route('service.delete',$service) }}" class="">
                            <i class="fa fa-trash"></i>
                    </a>
                     @elseif(Route::is('service.allDeleted'))
                    <a href="{{ route('service.restore',$service) }}" class="text-success">
                        <i class="fa fa-eye"></i>
                    </a>
                    @endif
                  </span>      
            </div>
                  <div class="product-desc">
                    @if( $service->status == 0)
                        <small class="text-muted">Servis Durumu 
                            <b class="text-success">Çalisir</b>
                        </small>
                    @elseif( $service->status == 1)
                      <small class="text-muted">Servis Durumu
                          <b class="text-info">Meşgül</b>
                      </small>
                    @else
                    <small class="text-muted">Servis Durumu
                        <b class="text-danger">Arzali</b>
                    </small>
                  @endif
                   
                      <a href="#" class="product-name">{{ $service->name  }} </a>
                      <div class="small m-t-xs">
                          Plaka phone <b class="text-info"> {{ $service->number_plate  }}</b>
                          <br>
                          Şöför adi <b class="text-info"> {{ $service->driver_name  }}</b>
                          <br>
                          Şöför phone <b class="text-info"> {{ $service->driver_phone  }}</b>
                      </div>
                      <div class="m-t text-left">
                            <a href="{{ route('reservation.list',['c'=>'Servis','i'=>$service->id]) }}" class="btn btn-xs btn-outline btn-primary">
                              Reservationları
                              <span class="hidden-sm hidden-xs"> Görüntle</span>
                              <i class="fa fa-long-arrow-right"></i>
                           </a>
                        </div>
                        <div class="form-group" style="margin-bottom:15%">
                          @if( $service->status == 0)
                          <div class="m-t  col-md-4 col-sm-4 col-xs-4">                                                   
                              <a href="{{ route('service.fix',$service->id) }}" class="btn btn-xs btn-outline btn-danger">
                                  <span class="hidden-sm hidden-xs">Tamir</span>
                                   <i class="fa fa-long-arrow-right"></i> 
                              </a>
                          </div>
                          <div class="m-t col-md-4 col-sm-4 col-xs-4">
                              <a href="{{ route('service.busy',$service->id) }}" class="btn btn-xs btn-outline btn-info">
                                      <span class="hidden-sm hidden-xs">  Meşgul</span>
                                       <i class="fa fa-long-arrow-right"></i> 
                              </a>
                          </div>
                          @else
                          <div class="m-t col-md-4 col-sm-4 col-xs-4">                        
                              <a href="{{ route('service.run',$service->id) }}" class="btn btn-xs btn-outline btn-success">
                                      <span class="hidden-sm hidden-xs">Çalistir </span>
                                       <i class="fa fa-long-arrow-right"></i> 
                              </a>
                          </div>
                         @endif
                         <div class="m-t text-right col-md-4 col-sm-4 col-xs-4">
                              <a href="{{ route('service.edit',$service->id) }}" class="btn btn-xs btn-outline btn-warning">
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
            @if(Route::is('service.index'))
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.services')</h2>
            @else
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.hidden_services')</h2>
            @endif
        </center>
      </div>
      @if(Route::is('service.index'))
        <div class="text-clear col-md-12">  </div>
        <div class="col-md-12 text-center">
            <a href="{{route('service.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i>  @lang('lang.click_to') @lang('lang.add')  @lang('lang.new_service')
            </a>
        </div>
      @endif 
    @endif 
    
  </div>
</div>

  @endsection
