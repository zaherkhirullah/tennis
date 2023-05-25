@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form action="{{ route('service.store') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="driver_name" class="col-sm-2 control-label">Şöför Adı</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="driver_name" name="driver_name"  class="form-control {{ $errors->has('driver_name') ? ' is-invalid' : '' }}"  value="{{ old('driver_name') }}" required autofocus>
                                        @if ($errors->has('driver_name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('driver_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="driver_phone" class="col-sm-2 control-label">Şöför Numarasi</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="driver_phone" name="driver_phone"  class="form-control {{ $errors->has('driver_phone') ? ' is-invalid' : '' }}"  value="{{ old('driver_phone') }}" required autofocus>
                                        @if ($errors->has('driver_phone'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('driver_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="number_plate" class="col-sm-2 control-label">Servis Plakası</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="number_plate" name="number_plate"  class="form-control {{ $errors->has('number_plate') ? ' is-invalid' : '' }}"  value="{{ old('number_plate') }}" required autofocus>
                                        @if ($errors->has('number_plate'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('number_plate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="hr-line-dashed"></div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-2 control-label">Servis Durumu</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<select class="form-control m-b" name="account">--}}
                                        {{--<option>Seç</option>--}}
                                        {{--<option>Çalışıyor</option>--}}
                                        {{--<option>Tamirde</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <button class="btn btn-primary" type="submit">create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
