@extends('layouts.admin')
@section('content')
 
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>EKortlar Listesi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Kortlar</a>
                </li>
                <li class="active">
                  @if(Route::is('kort.index'))
                    <b>  kortlar Listesi  </b>
                  @elseif(Route::is('kort.silindi'))
                    <b>  gizli kortlar listesi  </b>            
                  @endif
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('kort.create') }}" class="btn btn-primary" style="margin-top:15%">Yeni Kort Ekle</a>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        @foreach ($kortlar as $kort)
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ibox">
                <div class="ibox-content product-box">
                  <div class="product-imitation" style="background-image:url('{{asset('assets/KortList.jpg') }} ');max-width:100%;max-height:100%;">
                  </div>
                  <div class="product-desc">
                      <span class="product-price">
                          {{  $kort->Type->saat_fiyati}} $
                      </span>
                      <small class="text-muted">Kort Durumu
                       @if($kort->durum==0)
                        <b class="text-info"> müsait </b>
                       @else
                       <b class="text-danger"> tamirde </b>                       
                       @endif  
                      </small>
                    <a href="#" class="product-name">{{  $kort->isim}} </a>
                      <div class="small m-t-xs">
                          Kort Tipi <b class="text-success"> {{  $kort->Type->isim}}</b> 
                      </div>
                      <div class="m-t text-left">
                          <a href="{{ route('kort.rezervasyonlar',$kort->id) }}" class="btn btn-xs btn-outline btn-primary">Rezervasyonları Görüntle<i class="fa fa-long-arrow-right"></i> </a>
                      </div>
                      <div class="form-group" style="margin-bottom:15%">
                            <div class="m-t text-right col-md-4 col-sm-6 col-xs-6">                        
                        @if( $kort->durum == 0)
                              <a href="{{ route('kort.tamir',$kort->id) }}" class="btn btn-xs btn-outline btn-danger">
                                Tamir <i class="fa fa-long-arrow-right"></i> 
                              </a>
                        @else
                            <a href="{{ route('kort.calistir',$kort->id) }}" class="btn btn-xs btn-outline btn-success">
                              Çalistir <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        @endif
                    </div>

                        <div class="m-t col-md-4 col-sm-6 col-xs-6">
                              <a href="{{ route('kort.edit',$kort->id) }}" class="btn btn-xs btn-outline btn-warning">Düzenle<i class="fa fa-long-arrow-right"></i> </a>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
         </div>
        @endforeach
      </div>
    </div>

@endsection
