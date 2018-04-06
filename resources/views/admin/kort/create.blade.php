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
                        <form method="get" class="form-horizontal">
                            <div class="form-group">
                                <label for="isim" class="col-sm-2 control-label">Kort Adı</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="isim" name="isim"  class="form-control {{ $errors->has('isim') ? ' is-invalid' : '' }}"  value="{{ old('isim') }}" required autofocus>
                                        @if ($errors->has('isim'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('isim') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="saat_ucreti" class="col-sm-2 control-label">Saat ucreti</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="saat_ucreti" name="saat_ucreti"  class="form-control {{ $errors->has('saat_ucreti') ? ' is-invalid' : '' }}"  value="{{ old('saat_ucreti') }}" required autofocus>
                                        @if ($errors->has('saat_ucreti'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('saat_ucreti') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="saat_puani" class="col-sm-2 control-label">saat Puani</label>
                                <div class="col-sm-10">
                                        <input type="text"  id="saat_puani" name="saat_puani"  class="form-control {{ $errors->has('saat_puani') ? ' is-invalid' : '' }}"  value="{{ old('saat_puani') }}" required autofocus>
                                        @if ($errors->has('saat_puani'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('saat_puani') }}</strong>
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
                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">Kort Tipi</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="account">
                                        <option>Seç</option>
                                        <option>Tekli</option>
                                        <option>Çift</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Saat Fiyati</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b"><span class="input-group-addon">$</span> <input type="text" class="form-control"> <span class="input-group-addon">.00</span></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Saat Puanı</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b"><span class="input-group-addon">P</span> <input type="text" class="form-control"> <span class="input-group-addon">.00</span></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kort Durumu</label>
                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="account">
                                        <option>Seç</option>
                                        <option>Hazır</option>
                                        <option>Tamirde</option>
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
