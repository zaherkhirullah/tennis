@extends('layouts.app')

@section('content')
<div style="margin-left:150px;">
        <div class="col-md-9">
            <div class="card">
                <div class="ibox-title">
                        <h3 class="text-center">Giriş Yap</h3>
                    </div>

                <div class="ibox-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                            <label for="sifre" class="col-md-4 col-form-label text-md-right">sifre</label>

                            <div class="col-md-6">
                                <input id="sifre" type="password" class="form-control{{ $errors->has('sifre') ? ' is-invalid' : '' }}" name="sifre" required>

                                @if ($errors->has('sifre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sifre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your sifre?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
