@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                        <form action="{{ route("servis.update",['servi'=> $servi->id]) }}" method="post" class="form-horizontal">
                            @csrf
                            {{ method_field('put') }}
                            <div class="form-group {{ $errors->has('sofor_adi') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Şöför Adı</label>
                                <div class="col-sm-10 ">
                                    <input type="text" class="form-control" name="sofor_adi" value="{{ $servi->sofor_adi }}">
                                    @if ($errors->has('sofor_adi'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sofor_adi') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group {{ $errors->has('sofor_numarasi') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Şöför Numarası</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sofor_numarasi" value="{{ $servi->sofor_numarasi }}">

                                    @if ($errors->has('sofor_numarasi'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sofor_numarasi') }}</strong>
                                        </span>
                                    @endif


                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  {{ $errors->has('plaka') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">Servis Plakası</label>
                                <div class="col-sm-10">
                                    <input type="text" name="plaka" class="form-control" value="{{ $servi->plaka }}">
                                    @if ($errors->has('plaka'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('plaka') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Servis Durumu</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="durum">
                                        <option value="0" @if($servi->durum == 0) selected @endif>Çalışıyor</option>
                                        <option value="1" @if($servi->durum == 1) selected @endif >Meşgul</option>
                                        <option value="2" @if($servi->durum == 2) selected @endif>Arzali</option>
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
