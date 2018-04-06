@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form action="{{ route('servis.store') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="sofor_adi" class="col-sm-2 control-label">Şöför Adı</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="sofor_adi" name="sofor_adi"  class="form-control {{ $errors->has('sofor_adi') ? ' is-invalid' : '' }}"  value="{{ old('sofor_adi') }}" required autofocus>
                                        @if ($errors->has('sofor_adi'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('sofor_adi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="sofor_numarasi" class="col-sm-2 control-label">Şöför Numarasi</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="sofor_numarasi" name="sofor_numarasi"  class="form-control {{ $errors->has('sofor_numarasi') ? ' is-invalid' : '' }}"  value="{{ old('sofor_numarasi') }}" required autofocus>
                                        @if ($errors->has('sofor_numarasi'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('sofor_numarasi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="plaka" class="col-sm-2 control-label">Servis Plakası</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="plaka" name="plaka"  class="form-control {{ $errors->has('plaka') ? ' is-invalid' : '' }}"  value="{{ old('plaka') }}" required autofocus>
                                        @if ($errors->has('plaka'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('plaka') }}</strong>
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
