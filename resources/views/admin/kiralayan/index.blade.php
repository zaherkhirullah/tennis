@extends('layouts.admin')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-11">
        <div class="panel">
          <h4 class="panel-heading">
              @if(Route::is('kiralayan.index'))
            <center>  Kiralayan listesi  </center>
            @elseif(Route::is('kiralayan.silindi'))
            <center>  gizli Kiralayan listesi  </center>            
            @endif
          </h4>
          <div class="panel-body">  
            @if(count($Kiralayanlar))
              <table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th> @lang('lang.name')</th>
                      <th class="v-middle hidden-xs"> @lang('lang.phone"')</th>
                      <th class="v-middle hidden-xs"> @lang('lang.created_at')</th>     
                      <th> @lang('lang.options')</th>
                  </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> @lang('lang.name')</th>
                        <th class="v-middle hidden-xs"> @lang('lang.phone')</th>
                          <th class="v-middle hidden-xs"> @lang('lang.created_at')</th>     
                        <th> @lang('lang.options')</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach ($Kiralayanlar as $Kiralayan)
                    <tr>
                      <td>{{$Kiralayan->adi }}</td>
                      <td>{{$Kiralayan->telefon }}</td>
                      <td>{{$Kiralayan->created_at }}</td>
                      <td class="text-center">
                        <dt>
                          <a href="{{route('kiralayan.edit',$Kiralayan->id)}}" title="@lang('lang.edit') " class="text-info" >
                            <span class="text text-md" >
                            <i class="fa fa-edit"></i> 
                            </span>
                          </a>
                          @if(Route::is('kiralayan.index'))
                            <a href="#hide-file-{{$Kiralayan->id}}" title="@lang('lang.hide') " data-toggle="modal" class=" text-primary" >
                              <span class="text text-md" >
                                <i class="fa  fa-eye-slash"></i> 
                              </span>	
                            </a>
                            
                          @elseif(Route::is('kiralayan.silindi'))
                              <a href="#restore-file-{{$Kiralayan->id}}" title="@lang('lang.restore') " data-toggle="modal" class=" text-warning" >
                              <span class="text text-md" >
                                <i class="fa  fa-eye"></i> 
                              </span>	
                            </a>
                          @endif  
                            <a href="#delete-file-{{$Kiralayan->id}}" title="@lang('lang.delete') " data-toggle="modal" class=" text-danger" >
                              <span class="text text-md" >
                                <i class="fa  fa-trash"></i> 
                              </span>	
                            </a>
                        </dt>
                      </td>   
                    </tr>
                    <div class="modal fade" id="delete-file-{{$Kiralayan->id}}">
                      <div class="modal-dialog modal-shorten">
                        <div class="modal-content bg-default">
                          <div class="modal-body">
                            <div class="padder">
                              {{Form::open(array('route' =>['kiralayan.destroy',$Kiralayan->id],
                              'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}
            
                                <div class="text-center">
                                  <h4 id="msg-shorten ">@lang('lang.delete')  @lang('lang.file') </h4>
                                </div>
                                <p class="text-danger">@lang('lang.are_you_want')  @lang('lang.delete')
                                <b class="text-success">{{$Kiralayan->slug}}</b> @lang('lang.file') ?</p> 
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
                    @if(Route::is('kiralayan.index'))
                      <div class="modal fade" id="hide-file-{{$Kiralayan->id}}">
                        <div class="modal-dialog modal-shorten">
                          <div class="modal-content bg-default">
                          <div class="modal-body">
                            <div class="padder">
                              {{Form::open(array('route' =>['kiralayan.delete',$Kiralayan->id],
                              'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}
          
                              <div class="text-center">
                                <h4 id="msg-shorten "> @lang('lang.hidden_kiralayanlar')</h4>
                              </div>
                              <p class="text-danger">@lang('lang.are_you_want')   @lang('lang.hide')
                                <b class="text-success">{{$Kiralayan->slug}}</b>  @lang('lang.file') ?</p> 
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
                    @elseif(Route::is('kiralayan.deletedKiralayanlar'))
                      <div class="modal fade" id="restore-file-{{$Kiralayan->id}}">
                        <div class="modal-dialog modal-shorten">
                          <div class="modal-content bg-default">
                            <div class="modal-body">
                              <div class="padder">
                                {{Form::open(array('route' =>['kiralayan.restore',$Kiralayan->id], 'method'=>'post',
                                'class'=>'form-restore','id'=>'form-restore' ))
                                }}
                                <div class="text-center">
                                  <h4 id="msg-shorten "> @lang('lang.restore')  @lang('lang.file')</h4>
                                </div>
                                <hr>
                                <p>@lang('lang.are_you_want')   @lang('lang.restore')
                                  <b class="text-info">
                                    {{$Kiralayan->slug}} </b> @lang('lang.file') ?
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
                    @if(Route::is('kiralayan.index'))
                        <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.Kiralayanlar')</h2>
                    @else
                        <h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.hidden_kiralayanlar')</h2>
                    @endif
                </center>
              </div>
              @if(Route::is('kiralayan.index'))
                <div class="text-clear col-md-12">  </div>
                <div class="col-md-12 text-center">
                    <a href="{{route('kiralayan.create')}}" class="btn btn-success"> 
                    <i class="fa fa-plus"></i>  @lang('lang.click_to') @lang('lang.add')  New file
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
