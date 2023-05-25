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
                    <label for="name" class="col-sm-4 col-form-label text-md-right">Adi Soyadi</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
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
                    <label for="subject" class="col-sm-4 col-form-label text-md-right">subject</label>

                    <div class="col-md-6">
                        <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required autofocus>

                        @if ($errors->has('subject'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-sm-4 col-form-label text-md-right">message</label>

                    <div class="col-md-6">
                        <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required autofocus>

                        @if ($errors->has('message'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('message') }}</strong>
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
