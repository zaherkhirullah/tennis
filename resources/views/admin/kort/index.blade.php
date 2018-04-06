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
                          {{  $kort->saat_ucreti}} $
                      </span>
                      <small class="text-muted">Kort Durumu
                       @if($kort->durum==0)
                        <b class="text-info"> müsait </b>
                       @elseif($kort->durum==1)
                       <b class="text-warning"> meşgül </b>    
                       @else                
                       <b class="text-danger"> tamirde </b>                       
                          
                       @endif  
                      </small>
                    <a href="#" class="product-name">{{  $kort->isim}} </a>
                      <div class="small m-t-xs">
                          Kort Tipi
                          <b class="text-success">
                          @if($kort->type==0)
                          Tek                         
                          @else
                          Çift
                          @endif
                        </b> 
                          
                      </div>
                      <div class="m-t text-left">
                          <a href="{{ route('kort.rezervasyonlar',$kort->id) }}" class="btn btn-xs btn-outline btn-primary">
                            Rezervasyonları 
                            <span class="hidden-sm hidden-xs"> Görüntle</span>
                            <i class="fa fa-long-arrow-right"></i>
                         </a>
                      </div>
                      <div class="form-group" style="margin-bottom:15%">
                        @if( $kort->durum == 0)
                        <div class="m-t  col-md-4 col-sm-4 col-xs-4">                                                   
                            <a href="{{ route('kort.tamir',$kort->id) }}" class="btn btn-xs btn-outline btn-danger">
                                <span class="hidden-sm hidden-xs">Tamir</span>
                                 <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>
                        <div class="m-t col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('kort.mesgul',$kort->id) }}" class="btn btn-xs btn-outline btn-info">
                                    <span class="hidden-sm hidden-xs">  Meşgul</span>
                                     <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>
                        @else
                        <div class="m-t col-md-4 col-sm-4 col-xs-4">                        
                            <a href="{{ route('kort.calistir',$kort->id) }}" class="btn btn-xs btn-outline btn-success">
                                    <span class="hidden-sm hidden-xs">Çalistir </span>
                                     <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>
                       @endif
                       <div class="m-t text-right col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('kort.edit',$kort->id) }}" class="btn btn-xs btn-outline btn-warning">
                                <span class="hidden-sm hidden-xs"> Düzenle </span>
                                <i class="fa fa-edit"></i> </a>
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
