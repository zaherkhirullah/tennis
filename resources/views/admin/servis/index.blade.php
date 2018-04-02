@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-11">
        <div class="panel">
          <h4 class="panel-heading">
            @if(Route::is('servis.index'))
              <center>  servis listesi  </center>
            @elseif(Route::is('servis.silindi'))
              <center>  gizli servis listesi  </center>            
            @endif
          </h4>
          <div class="panel-body">  
            @if(count($servisler))
              <table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th> @lang('lang.name')</th>
                      <th class="v-middle hidden-xs"> @lang('lang.plaka')</th>
                      <th class="v-middle hidden-xs"> @lang('lang.sofor_adi')</th>     
                      <th class="v-middle hidden-xs"> @lang('lang.sofor_numarasi')</th>
                      <th class="v-middle hidden-xs"> @lang('lang.created_at')</th>     
                      <th> @lang('lang.options')</th>
                  </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> @lang('lang.name')</th>
                        <th class="v-middle hidden-xs"> @lang('lang.plaka')</th>
                        <th class="v-middle hidden-xs"> @lang('lang.sofor_adi')</th>     
                        <th class="v-middle hidden-xs"> @lang('lang.sofor_numarasi')</th>
                          <th class="v-middle hidden-xs"> @lang('lang.created_at')</th>     
                        <th> @lang('lang.options')</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach ($servisler as $servis)
                    <tr>
                      <td>{{$servis->isim }}</td>
                      <td>{{$servis->plaka }}</td>
                      <td>{{$servis->sofor_adi }}</td>
                      <td>{{$servis->sofor_numarasi }}</td>
                      <td>{{$servis->created_at }}</td>
                      <td class="text-center">
                        <dt>
                          <a href="{{route('servis.edit',$servis->id)}}" title="@lang('lang.edit') " class="text-info" >
                            <span class="text text-md" >
                            <i class="fa fa-edit"></i> 
                            </span>
                          </a>
                          @if(Route::is('servis.index'))
                            <a href="#hide-file-{{$servis->id}}" title="@lang('lang.hide') " data-toggle="modal" class=" text-primary" >
                              <span class="text text-md" >
                                <i class="fa  fa-eye-slash"></i> 
                              </span>	
                            </a>
                            
                          @elseif(Route::is('servis.silindi'))
                              <a href="#restore-file-{{$servis->id}}" title="@lang('lang.restore') " data-toggle="modal" class=" text-warning" >
                              <span class="text text-md" >
                                <i class="fa  fa-eye"></i> 
                              </span>	
                            </a>
                          @endif  
                            <a href="#delete-file-{{$servis->id}}" title="@lang('lang.delete') " data-toggle="modal" class=" text-danger" >
                              <span class="text text-md" >
                                <i class="fa  fa-trash"></i> 
                              </span>	
                            </a>
                        </dt>
                      </td>   
                    </tr>
                    <div class="modal fade" id="delete-file-{{$servis->id}}">
                      <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                          <div class="modal-body">
                            <div class="padder">
                              {{Form::open(array('route' =>['servis.destroy',$servis->id],
                              'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}
            
                                <div class="text-center">
                                  <h4 id="msg-shorten ">@lang('lang.delete')  @lang('lang.file') </h4>
                                </div>
                                <p class="text-danger">@lang('lang.are_you_want')  @lang('lang.delete')
                                <b class="text-success">{{$servis->slug}}</b> @lang('lang.file') ?</p> 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                      @lang('lang.cancle')
                                  </button>
                                  <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                    <i class="fa fa-trash"></i> @lang('lang.delete')
                                  </button>
                                </div>
                                {{Form::close() }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @if(Route::is('servis.index'))
                      <div class="modal fade" id="hide-file-{{$servis->id}}">
                        <div class="modal-dialog modal-shorten">
                          <div class="modal-content bg-default">
                          <div class="modal-body">
                            <div class="padder">
                              {{Form::open(array('route' =>['servis.delete',$servis->id],
                              'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}
          
                              <div class="text-center">
                                <h4 id="msg-shorten "> @lang('lang.hidden_servisler')</h4>
                              </div>
                              <p class="text-danger">@lang('lang.are_you_want')   @lang('lang.hide')
                                <b class="text-success">{{$servis->slug}}</b>  @lang('lang.file') ?</p> 
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                      @lang('lang.cancle')
                                  </button>
                                  <button id="btn-delete" class="btn btn-rounded  pull-right btn-success" type="submit">
                                    <i class="fa fa-eye-slash"></i>  @lang('lang.hide')
                                  </button>
                                </div>
                                {{Form::close() }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @elseif(Route::is('servis.deletedservisler'))
                      <div class="modal fade" id="restore-file-{{$servis->id}}">
                        <div class="modal-dialog modal-shorten">
                          <div class="modal-content bg-default">
                            <div class="modal-body">
                              <div class="padder">
                                {{Form::open(array('route' =>['servis.restore',$servis->id], 'method'=>'post',
                                'class'=>'form-restore','id'=>'form-restore' ))
                                }}
                                <div class="text-center">
                                  <h4 id="msg-shorten "> @lang('lang.restore')  @lang('lang.file')</h4>
                                </div>
                                <hr>
                                <p>@lang('lang.are_you_want')   @lang('lang.restore')
                                  <b class="text-info">
                                    {{$servis->slug}} </b> @lang('lang.file') ?
                                  </p> 
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-rounded pull-left btn-default" data-dismiss="modal">
                                        @lang('lang.cancle')
                                    </button>
                                    <button id="btn-restore" class="btn btn-rounded  pull-right btn-success" type="submit">
                                      <i class="fa fa-eye"></i> @lang('lang.restore')
                                    </button>
                                  </div>
                                  {{Form::close() }}
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                </tbody>
              </table>
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
      </div>
    </div>
  </div>
@endsection
