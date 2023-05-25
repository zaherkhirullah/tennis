@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                        <form action="{{ route("service.update",['service'=> $servi->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group {{ $errors->has('driver_name') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Şöför Adı</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control" name="driver_name" value="{{ $servi->driver_name }}">
                                    @if ($errors->has('driver_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('driver_name') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group {{ $errors->has('driver_phone') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Şöför Numarası</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="driver_phone" value="{{ $servi->driver_phone }}">

                                    @if ($errors->has('driver_phone'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('driver_phone') }}</strong>
                                        </span>
                                    @endif


                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  {{ $errors->has('number_plate') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Servis Plakası</label>
                                <div class="col-sm-10">
                                    <input type="text" name="number_plate" class="form-control" value="{{ $servi->number_plate }}">
                                    @if ($errors->has('number_plate'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number_plate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Servis Durumu</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="status">
                                        <option value="0" @if($servi->status == 0) selected @endif>Çalışıyor</option>
                                        <option value="1" @if($servi->status == 1) selected @endif >Meşgul</option>
                                        <option value="2" @if($servi->status == 2) selected @endif>Arzali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
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
