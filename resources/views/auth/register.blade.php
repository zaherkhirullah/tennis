@extends('layouts.app')

@section('content')
<div style="margin-left:150px;">
        <div class="col-md-9">
        <div class="ibox-title">
                <h3 class="text-center">Uye Ol</h3>            
        </div>
            <div class="ibox-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group row">
                                <label for="isim" class="col-md-4 col-form-label text-md-right">@lang('lang.name')</label>

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
                                    <label for="telefon" class="col-md-4 col-form-label text-md-right">Telefon</label>
        
                                    <div class="col-md-6">
                                        <input id="telefon" type="text" class="form-control{{ $errors->has('telefon') ? ' is-invalid' : '' }}" name="telefon" value="{{ old('telefon') }}" required autofocus>
                                        @if ($errors->has('telefon'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('telefon') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="cinsiyet" class="col-md-4 col-form-label text-md-right">Cinsiyet</label>
                                <div class="col-md-6">
                                    <input id="cinsiyet" type="text" class="form-control{{ $errors->has('cinsiyet') ? ' is-invalid' : '' }}" name="cinsiyet" value="{{ old('cinsiyet') }}" required autofocus>

                                    @if ($errors->has('cinsiyet'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cinsiyet') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="yas" class="col-md-4 col-form-label text-md-right">Yaş</label>

                                <div class="col-md-6">
                                    <input id="yas" type="text" class="form-control{{ $errors->has('yas') ? ' is-invalid' : '' }}" name="yas" value="{{ old('yas') }}" required autofocus>

                                    @if ($errors->has('yas'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('yas') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Şifre</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Şifre Tekrar</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 pull-right ">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
