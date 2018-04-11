@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">create rezervasyon</div>
                <form action="{{ route('rezervasyon.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="isim" class="col-sm-2 control-label">Kort Adı</label>
                        <div class="col-sm-10">

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
                        <label class="col-sm-2 control-label">Saat Ucreti</label>
                        <div class="col-sm-10">
                            <div class="input-group m-b">
                                <span class="input-group-addon">$</span>
                                <input type="text"  id="saat_ucreti" name="saat_ucreti"  class="form-control {{ $errors->has('saat_ucreti') ? ' is-invalid' : '' }}"  value="{{ old('saat_ucreti') }}" required autofocus>
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
                                <input type="text"  id="saat_puani" name="saat_puani"  class="form-control {{ $errors->has('saat_puani') ? ' is-invalid' : '' }}"  value="{{ old('saat_puani') }}" required autofocus>
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
                                <option value="0" @if(old('durum')==0 ) selected @endif>Hazır</option>
                                <option value="1" @if(old('durum')==1 ) selected @endif>Meşgul</option>
                                <option value="2" @if(old('durum')==2 ) selected @endif>Tamirde</option>
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
                            {{-- <button class="btn btn-white" type="submit">Cancel</button> --}}
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
