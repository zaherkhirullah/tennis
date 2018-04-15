@extends('layouts.admin')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Şimdiki Dilim Zamanındaki Kortlar</h5>
                </div>
                <div class="ibox-content">
                    @if(count($simdikiler)>0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kort</th>
                            <th>Rezerv Eden</th>
                            <th>Rezerv Tel</th>
                            <th>Rezerv Süresi</th>
                            <th>Ödenecek</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($simdikiler as $rezv )
                            <tr>
                        <td>{{ $rezv->id}} </td>
                            <td>
                                @if($rezv->kort->type ==1)
                                    Tek'li Kort
                                @else
                                    Çift'li Kort
                                @endif
                            </td>
                            <td>{{ $rezv->kiralayan->isim }}</td>
                            <td>{{ $rezv->kiralayan->telefon }}</td>
                            <td>1 saat</td>
                            <td>{{ $rezv->odenecek }}</td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text danger"> her hangi bir kayit bulunmadi . </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Sonraki Dilim Zamanındaki Kortlar</h5>
                </div>
                <div class="ibox-content">
                   @if($sonrakiler)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>Kort tipi</th>
                                <th>Rezerv Eden</th>
                                <th>Rezerv Tel</th>
                                <th>Rezerv Süresi</th>
                                <th>Ödenecek</th>
                                <th>Servis surucusu</th>
                                <th>Servis Adresi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sonrakiler as $rezv )
                            <tr>
                                <td></td>
                                <td>{{ $rezv->kort->isim }}</td>
                                <td>
                                    @if($rezv->kort->type ==1)
                                        Tek'li Kort
                                    @else
                                        Çift'li Kort
                                    @endif
                                </td>
                                <td>{{ $rezv->kiralayan->isim }}</td>
                                <td>{{ $rezv->kiralayan->telefon }}</td>
                                <td>1 saat</td>
                                <td>{{ $rezv->odenecek}}</td>
                                <td>{{ $rezv->servis->sofor_adi}}</td>
                                <td>@if($rezv->servis_adresi){{$rezv->servis_adresi}}@else Servis Kullanilmayacaktir @endif</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text danger"> her hangi bir kayit bulunmadi . </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tüm geçmiş Rezevasyonlar</h5>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>Rezerv Eden</th>
                                <th>Rezerv Tel</th>
                                <th>Rezerv Süresi</th>
                                <th>Ödenecek</th>
                                <th>Servis Adresi</th>


                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gecmisler as $rezv )
                            <tr>
                                <td> </td>
                                <td>
                                    @if($rezv->kort->type ==1)
                                        Tek'li Kort
                                    @else
                                        Çift'li Kort
                                    @endif
                                </td>
                                <td>{{ $rezv->kiralayan->isim }}</td>
                                <td>{{ $rezv->kiralayan->telefon }}</td>
                                <td>1 saat</td>
                                <td>{{ $rezv->odenecek}}</td>
                                <td>@if($rezv->servis_adresi){{$rezv->servis_adresi}}@else Servis Kullanilmadi @endif</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tüm Gelecek Rezevasyonlar</h5>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>Kort tipi</th>
                                <th>Rezerv Eden</th>
                                <th>Rezerv Tel</th>
                                <th>Rezerv Süresi</th>
                                <th>Ödenmiş</th>
                                <th>Servis surucusu</th>
                                <th>Servis Adresi</th>

                            </tr>
                        </thead>
                        <tbody>
                             @foreach($sonrakiler as $rezv )
                            <tr>
                                <td></td>
                                <td>{{ $rezv->kort->isim }}</td>
                                <td>
                                    @if($rezv->kort->type ==1)
                                        Tek'li Kort
                                    @else
                                        Çift'li Kort
                                    @endif
                                </td>
                                <td>{{ $rezv->kiralayan->isim }}</td>
                                <td>{{ $rezv->kiralayan->telefon }}</td>
                                <td>1 saat</td>
                                <td>{{ $rezv->odenecek}}</td>
                                <td>{{ $rezv->servis->sofor_adi}}</td>
                                <td>@if($rezv->servis_adresi){{$rezv->servis_adresi}}@else Servis Kullanilmayacaktir @endif</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
