@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
                        <form action="{{ route('servis.store') }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Şöför Adı</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control" name="sofor_adi">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Şöför Numarası</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sofor_numarasi">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Servis Plakası</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="plaka">
                                </div>
                            </div>
                            {{--<div class="hr-line-dashed"></div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-2 control-label">Servis Durumu</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<select class="form-control m-b" name="account">--}}
                                        {{--<option>Seç</option>--}}
                                        {{--<option>Çalışıyor</option>--}}
                                        {{--<option>Tamirde</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
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
