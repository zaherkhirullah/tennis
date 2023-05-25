@extends('layouts.admin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Kort Ekle</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="KortlarListesi.html">Kortlar Listesi</a>
                </li>
                <li class="active">
                    <strong>Kort Ekle</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                        <form action="{{ route('stage.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Kort Adı</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="name" name="name"  class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kort Tipi</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="type">
                                        <option value="0"  >Seç</option>
                                        <option value="0" @if(old('type')==0 ) selected @endif>Tekli</option>
                                        <option value="1" @if(old('type')==1 ) selected @endif  >Çift</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                     @endif 
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="col-sm-2 control-label">hour Ucreti</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon">$</span>
                                         <input type="text"  id="hour_fee" name="hour_fee"  class="form-control {{ $errors->has('hour_fee') ? ' is-invalid' : '' }}"  value="{{ old('hour_fee') }}" required autofocus>
                                        @if ($errors->has('hour_fee'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('hour_fee') }}</strong>
                                            </span>
                                        @endif
                                          <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">hour Puanı</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon">P</span> 
                                        <input type="text"  id="hour_score" name="hour_score"  class="form-control {{ $errors->has('hour_score') ? ' is-invalid' : '' }}"  value="{{ old('hour_score') }}" required autofocus>
                                        @if ($errors->has('hour_score'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('hour_score') }}</strong>
                                            </span>
                                         @endif 
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kort Durumu</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="status">
                                        <option value="0"  >Seç</option>
                                        <option value="0" @if(old('status')==0 ) selected @endif>Hazır</option>
                                        <option value="1" @if(old('status')==1 ) selected @endif>Meşgul</option>
                                        <option value="2" @if(old('status')==2 ) selected @endif>Tamirde</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif 
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {{-- <button class="btn btn-white" type="submit">Cancel</button> --}}
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
