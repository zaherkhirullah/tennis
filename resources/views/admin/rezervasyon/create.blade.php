@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">create rezervasyon</div>
                <form action="{{ route('rezervasyon.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @if(Auth::user())
                        <div class="form-group">
                            <label for="isim" class="col-sm-2 control-label">isim</label>
                            <div class="col-sm-10">
                                <input type="text" name="isim" id="isim" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="isim" class="col-sm-2 control-label">Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" name="telefon" id="telefon" class="form-control">
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <label for="isim" class="col-sm-2 control-label">Kort</label>
                        <div class="col-sm-10">
                            <select name="kort_id" id="kort_id" class="form-control">
                                @foreach($kortlar as $kort)
                                    <option value="{{ $kort->id }}">{{ $kort->isim }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label for="isim" class="col-sm-2 control-label">Servis</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<select name="kort" id="kort" class="form-control">--}}
                                {{--@foreach($servisler as $servis)--}}
                                    {{--<option value="{{ $servis->id }}">{{ $servis->isim }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        <label for="isim" class="col-sm-2 control-label">Adres</label>
                        <div class="col-sm-10">
                            <input type="text" name="adres" id="adres" class="form-control">
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
