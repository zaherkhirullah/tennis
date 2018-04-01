@extends('layouts.admin')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">index Contacts</div>

<div class="card-body">
<section class="box-body ">   
@if(count($contacts))
<table id="DataTable" class="mdl-data-table  table-hover" cellspacing="0" width="100%">
<div class="col-md-3 " style="top:10px;">
<a href="{{route('contacts.create')}}" type="button" class="btn btn-success btn-md">
<i class="fa fa-plus-circle"></i>
@lang('lang.add')  @lang('lang.new_file') 
</a>
</div>
<thead>
<tr>
<th> @lang('lang.name')</th>
<th class="v-middle hidden-xs"> @lang('lang.email')</th>
<th> @lang('lang.Subject')</th>
<th class="v-middle hidden-xs"> @lang('lang.Message')</th>

<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
{{--  <th> @lang('lang.updated_at')</th>  --}}
<th> @lang('lang.options')</th>
</tr>
</thead>
<tfoot>
<tr>
<th> @lang('lang.name')</th>
<th class="v-middle hidden-xs"> @lang('lang.email')</th>
<th> @lang('lang.Subject')</th>
<th class="v-middle hidden-xs"> @lang('lang.Message')</th>

<th class="v-middle hidden-xs"> @lang('lang.created_at')</th>
{{--  <th> @lang('lang.updated_at')</th>  --}}
<th> @lang('lang.options')</th>
</tr>
</tfoot>
<tbody>
@foreach ($contacts as $contact)
<tr>
<td>

<a href="{{$contact->shorted_url}}" class="h5 text-info" target="_blank">
<strong>{{$contact->shorted_url}}</strong>
<dt>
<small class="text-muted block">
<a class="btn btn-xs text-info btn-copy" data-clipboard-text=" {{$contact->shorted_url}}"  data-toggle="button">
<span class="text">
<i class="ion ion-ios-copy-outline"> </i> @lang('lang.copy')
</span>
<span class="text-active">
@lang('lang.copied')
</span>
</a>
<a class="btn btn-xs text-info btn-copy" href="{{url($contact->path)}}" title="Download"  download>
<span class="text">
<i class="fa fa-download"> </i> @lang('lang.download')
</span>
<span class="text-active">
@lang('lang.downloaded')
</span>
</a>
</small>

</dt>
</a>
</td>

<!-- <td>{{$contact->title }}</td> -->
<td>{{$contact->description }}</td>
<!-- <td>{{$contact->views }}</td> -->
<td>{{$contact->downloads }}</td>

<td>
<b class="text-success"><i class="fa fa-user"></i></b>  {{$contact->user->first_name }} 
@if($contact->isPrivate == 0)
| <b class="text-success"><i class="fa fa-eye"></i></b>@lang('lang.public') 
@else  
| <b class="text-success"><i class="fa fa-eye-slash"></i></b>@lang('lang.private')  
@endif

@if($contact->password)
| <b class="text-success"><i class="fa fa-lock"></i></b> {{$contact->password}}
@else 
| <b class="text-success"><i class="fa fa-unlock"></i></b>
@endif
| <b class="text-success"><i class="fa fa-folder"></i></b>  {{$contact->folder->name }}
</td>

<td>{{$contact->created_at }}</td>
<!-- <td>{{$contact->updated_at }}</td>                   -->

<td class="text-center">
<dt>
<a href="{{route('contacts.edit',$contact->id)}}" title="@lang('lang.edit') " class="text-info" >
<span class="text text-md" >
<i class="fa fa-edit"></i> 
</span>
</a>
@if(Route::is('contacts.index'))
<a href="#hide-file-{{$contact->id}}" title="@lang('lang.hide') " data-toggle="modal" class=" text-primary" >
<span class="text text-md" >
<i class="fa  fa-eye-slash"></i> 
</span>	
</a>

@elseif(Route::is('contacts.deletedcontacts'))
<a href="#restore-file-{{$contact->id}}" title="@lang('lang.restore') " data-toggle="modal" class=" text-warning" >
<span class="text text-md" >
<i class="fa  fa-eye"></i> 
</span>	
</a>
@endif  
<a href="#delete-file-{{$contact->id}}" title="@lang('lang.delete') " data-toggle="modal" class=" text-danger" >
<span class="text text-md" >
<i class="fa  fa-trash"></i> 
</span>	
</a>
</dt>
</td>   
</tr>
<div class="modal fade" id="delete-file-{{$contact->id}}">
<div class="modal-dialog modal-shorten">
<div class="modal-content bg-default">
<div class="modal-body">
<div class="padder">
{{Form::open(array('route' =>['contacts.destroy',$contact->id],
'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}

<div class="text-center">
<h4 id="msg-shorten ">@lang('lang.delete')  @lang('lang.file') </h4>
</div>
<p class="text-danger">@lang('lang.are_you_wont')  @lang('lang.delete')
<b class="text-success">{{$contact->slug}}</b> @lang('lang.file') ?</p> 
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
@if(Route::is('contacts.index'))
<div class="modal fade" id="hide-file-{{$contact->id}}">
<div class="modal-dialog modal-shorten">
<div class="modal-content bg-default">
<div class="modal-body">
<div class="padder">
{{Form::open(array('route' =>['contacts.delete',$contact->id],
'method'=>'delete','class'=>'form-delete','id'=>'form-delete' )) }}

<div class="text-center">
<h4 id="msg-shorten "> @lang('lang.hidden_contacts')</h4>
</div>
<p class="text-danger">@lang('lang.are_you_wont')   @lang('lang.hide')
<b class="text-success">{{$contact->slug}}</b>  @lang('lang.file') ?</p> 
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
@elseif(Route::is('contacts.deletedcontacts'))
<div class="modal fade" id="restore-file-{{$contact->id}}">
<div class="modal-dialog modal-shorten">
<div class="modal-content bg-default">
<div class="modal-body">
<div class="padder">
{{Form::open(array('route' =>['contacts.restore',$contact->id], 'method'=>'post',
'class'=>'form-restore','id'=>'form-restore' ))
}}
<div class="text-center">
<h4 id="msg-shorten "> @lang('lang.restore')  @lang('lang.file')</h4>
</div>
<hr>
<p>@lang('lang.are_you_wont')   @lang('lang.restore')
<b class="text-info">
{{$contact->slug}} </b> @lang('lang.file') ?
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
@if(Route::is('contacts.index'))
<h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.contacts')</h2>
@else
<h2 class="text-danger alert alert-warning"> @lang('lang.dont_have') @lang('lang.hidden_contacts')</h2>
@endif
</center>
</div>
@if(Route::is('contacts.index'))
<div class="text-clear col-md-12">  </div>
<div class="col-md-12 text-center">
<a href="{{route('contacts.create')}}" class="btn btn-success"> 
<i class="fa fa-plus"></i>  @lang('lang.click_to') @lang('lang.add')  New file
</a>
</div>
@endif 
@endif 
</section>
</div>
</div>
</div>
</div>
</div>
@endsection
