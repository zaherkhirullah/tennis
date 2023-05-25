@extends('layouts.admin')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Kortlar Listesi</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Kortlar</a>
                </li>
                <li class="active">
                  @if(Route::is('stage.index'))
                    <b>  stages Listesi  </b>
                  @elseif(Route::is('stage.allDeleted'))
                    <b>  gizli stages listesi  </b>
                  @endif
                </li>
            </ol>
        </div>
        <div class="col-lg-4" style="margin-top:3%">
                <a href="{{ route('stage.create') }}" class="btn btn-primary" ><i class="fa fa-plus"></i> Ekle</a>
 
                @if(Route::is('stage.index'))
                <a href="{{ route('stage.allDeleted') }}" class="btn btn-danger" ><i class="fa fa-trash"></i> Silinen göster </a>
              @elseif(Route::is('stage.allDeleted'))
              <a href="{{ route('stage.index') }}" class="btn btn-success" ><i class="fa fa-check"></i> Activeler göster </a>
              @endif
            </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
       @if(count($stages))
        @foreach ($stages as $stage)
          <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="ibox">
                <div class="ibox-content product-box">
                  <div class="product-imitation" style="background-image:url('{{asset('assets/KortList.jpg') }} ');max-width:100%;max-height:100%;">
                    <span class="left-ust white-bg pad5" id="de_trash"> 
                            @if(Route::is('stage.index'))
                            <a href="{{ route('stage.delete',$stage) }}" class="">
                                    <i class="fa fa-trash"></i>
                            </a>
                             @elseif(Route::is('stage.allDeleted'))
                            <a href="{{ route('stage.restore',$stage) }}" class="text-success">
                                <i class="fa fa-eye"></i>
                            </a>
                            @endif
                      </span>  
                      
                </div>
                  <div class="product-desc">

                      <span class="product-price">
                          {{  $stage->hour_fee}} $
                      </span>
                    
                      <small class="text-muted">Kort Durumu

                       @if($stage->status==0)
                        <b class="text-info"> müsait </b>
                       @elseif($stage->status==1)
                       <b class="text-warning"> meşgül </b>    
                       @else                
                       <b class="text-danger"> fixde </b>
                          
                       @endif  
                      </small>
                      <a href="#" class="product-name">{{  $stage->name}} </a>
                      <div class="small m-t-xs">
                          Kort Tipi
                          <b class="text-success">
                          @if($stage->type==0)
                          Tek                         
                          @else
                          Çift
                          @endif
                        </b> 
                          
                      </div>
                      <div class="m-t text-left">
                          <a href="{{ route('reservation.list',['c'=>'Stage','i'=>$stage->id]) }}" class="btn btn-xs btn-outline btn-primary">
                            Reservationları
                            <span class="hidden-sm hidden-xs"> Görüntle</span>
                            <i class="fa fa-long-arrow-right"></i>
                         </a>
                      </div>
                      <div class="form-group" style="margin-bottom:15%">
                        @if( $stage->status == 0)
                        <div class="m-t  col-md-4 col-sm-4 col-xs-4">                                                   
                            <a href="{{ route('stage.fix',$stage->id) }}" class="btn btn-xs btn-outline btn-danger">
                                <span class="hidden-sm hidden-xs">Tamir</span>
                                 <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>
                        <div class="m-t col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('stage.busy',$stage->id) }}" class="btn btn-xs btn-outline btn-info">
                                    <span class="hidden-sm hidden-xs">  Meşgul</span>
                                     <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>

                        @else
                        <div class="m-t col-md-4 col-sm-4 col-xs-4">                        
                            <a href="{{ route('stage.run',$stage->id) }}" class="btn btn-xs btn-outline btn-success">
                                    <span class="hidden-sm hidden-xs">Çalistir </span>
                                     <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>
                       @endif
                       <div class="m-t text-right col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('stage.edit',$stage->id) }}" class="btn btn-xs btn-outline btn-warning">
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
            @if(Route::is('stage.index'))
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.stages')</h2>
                <div class="text-clear col-md-12">  </div>
                <div class="col-md-12 text-center">
                    <a href="{{route('stage.create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>  @lang('lang.click_to') @lang('lang.add')  @lang('lang.new_stage')
                    </a>
                </div>
            @else
                <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.hidden_stages')</h2>
            @endif
          </center>
        </div>
      @endif 
      </div>
    </div>

@endsection
