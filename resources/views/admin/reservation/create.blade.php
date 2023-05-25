@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">create reservation</div>
                <form action="{{ route('reservation.store') }}" method="post" class="form-horizontal">
                    @csrf
                    @guest
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Telefon</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                        </div>
                    @endguest


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Kort</label>
                        <div class="col-sm-10">
                            <select name="stage_id" id="stage_id" class="form-control">
                                @foreach($stages as $stage)
                                    <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="col-sm-2 control-label">Servis</label>--}}
                        {{--<div class="col-sm-10">--}}
                            {{--<select name="stage" id="stage" class="form-control">--}}
                                {{--@foreach($services as $service)--}}
                                    {{--<option value="{{ $service->id }}">{{ $service->name }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        <label for="name" class="col-sm-2 control-label">Adres</label>
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
