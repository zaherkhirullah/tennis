@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="card text-center">
        <div class="ibox-title">
                <h3 class="text-center">Iletişim formu</h3>
            </div>
        <div class="ibox-content">
            <form method="POST" action="{{ route('p_contacts') }}">
                @csrf

                <div class="form-group row">
                    <label for="isim" class="col-sm-4 col-form-label text-md-right">Adi Soyadi</label>

                    <div class="col-md-6">
                        <input id="isim" type="text" class="form-control{{ $errors->has('isim') ? ' is-invalid' : '' }}" name="isim" value="{{ old('isim') }}" required autofocus>

                        @if ($errors->has('isim'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('isim') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="konu" class="col-sm-4 col-form-label text-md-right">konu</label>

                    <div class="col-md-6">
                        <input id="konu" type="text" class="form-control{{ $errors->has('konu') ? ' is-invalid' : '' }}" name="konu" value="{{ old('konu') }}" required autofocus>

                        @if ($errors->has('konu'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('konu') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mesaj" class="col-sm-4 col-form-label text-md-right">mesaj</label>

                    <div class="col-md-6">
                        <input id="mesaj" type="text" class="form-control{{ $errors->has('mesaj') ? ' is-invalid' : '' }}" name="mesaj" value="{{ old('mesaj') }}" required autofocus>

                        @if ($errors->has('mesaj'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('mesaj') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row text-center">
                    <div class="col-md-8 col-xs-offset-3 ">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-send"></i>   Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
