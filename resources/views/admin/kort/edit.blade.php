@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                            <form action="{{ route('kort.update',$kort->id) }}" method="post" class="form-horizontal">
                                    @csrf
                                {{ method_field('put') }}
                                    
                                    <div class="form-group">
                                        <label for="isim" class="col-sm-2 control-label">Kort Adı</label>
                                        <div class="col-sm-10">
                                                <input type="text"  id="isim" name="isim"  class="form-control {{ $errors->has('isim') ? ' is-invalid' : '' }}"  value="{{ $kort->isim }}" required autofocus>
                                                @if ($errors->has('isim'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('isim') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kort Tipi</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="type">
                                                <option value="0" >Seç</option>
                                                <option value="0"  @if($kort->type==0) selected @endif>Tekli</option>
                                                <option value="1"  @if($kort->type==1) selected @endif>Çift</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                             @endif 
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Saat Ucreti</label>
                                        <div class="col-sm-10">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">$</span>
                                                 <input type="text"  id="saat_ucreti" name="saat_ucreti"  class="form-control {{ $errors->has('saat_ucreti') ? ' is-invalid' : '' }}"  value="{{ $kort->saat_ucreti }}" required autofocus>
                                                @if ($errors->has('saat_ucreti'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('saat_ucreti') }}</strong>
                                                    </span>
                                                @endif
                                                  <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Saat Puanı</label>
                                        <div class="col-sm-10">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">P</span> 
                                                <input type="text"  id="saat_puani" name="saat_puani"  class="form-control {{ $errors->has('saat_puani') ? ' is-invalid' : '' }}"  value="{{ $kort->saat_puani }}" required autofocus>
                                                @if ($errors->has('saat_puani'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('saat_puani') }}</strong>
                                                    </span>
                                                 @endif 
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kort Durumu</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="durum">
                                                <option value="0"  >Seç</option>
                                                <option value="0" @if($kort->durum==0) selected @endif>Hazır</option>
                                                <option value="1" @if($kort->durum==1) selected @endif>Meşgul</option>
                                                <option value="2" @if($kort->durum==2) selected @endif>Tamirde</option>
                                            </select>
                                            @if ($errors->has('durum'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('durum') }}</strong>
                                                </span>
                                            @endif 
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
