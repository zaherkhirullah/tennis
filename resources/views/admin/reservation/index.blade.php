@extends('layouts.admin')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Bekleyenler</h5>
                </div>
                <div class="ibox-content">
                    @if($bekleyenler)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Bekleyen Adi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bekleyenler  as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->renter()->name}}</td>
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
                    <h5>Şimdiki Dilim Zamanındaki Kortlar   <span> {{ \Carbon\Carbon::now()->startOfHour()->toTimeString()}}</span></h5>
                </div>
                <div class="ibox-content">
                    @if($currentReservations)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kort</th>
                            <th>reservationEden</th>
                            <th>reservationTel</th>
                            <th>reservationSüresi</th>
                            <th>Ödenecek</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($currentReservations as $rezv )
                            <tr>
                        <td>{{ $rezv->id}} </td>
                            <td>
                                @if($rezv->stage->type ==1)
                                    Tek'li Kort
                                @else
                                    Çift'li Kort
                                @endif
                            </td>
                            <td>{{ $rezv->renter->name }}</td>
                            <td>{{ $rezv->renter->phone }}</td>
                            <td>1 hour</td>
                            <td>{{ $rezv->payable }}</td>
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
                    <h5>Sonraki Dilim Zamanındaki Kortlar      <span> {{ \Carbon\Carbon::now()->addHour()->startOfHour()->toTimeString()}}</span></h5>
                </div>
                <div class="ibox-content">
                   @if($nextReservations)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>Kort tipi</th>
                                <th>reservationEden</th>
                                <th>reservationTel</th>
                                <th>reservationSüresi</th>
                                <th>Ödenecek</th>
                                <th>Servis surucusu</th>
                                <th>Servis Adresi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nextReservations as $rezv )
                            <tr>
                                <td></td>
                                <td>{{ $rezv->stage->name }}</td>
                                <td>
                                    @if($rezv->stage->type ==1)
                                        Tek'li Kort
                                    @else
                                        Çift'li Kort
                                    @endif
                                </td>
                                <td>{{ $rezv->renter->name }}</td>
                                <td>{{ $rezv->renter->phone }}</td>
                                <td>1 hour</td>
                                <td>{{$rezv->payable}}</td>

                                <td>{{ $rezv->service->driver_name}}</td>
                                <td>@if($rezv->service_address){{$rezv->service_address}}@else Servis Kullanilmayacaktir @endif</td>
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
                @if($oldReservations)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>Kort tipi</th>
                                <th>start_at</th>
                                <th>reservationEden</th>
                                <th>reservationTel</th>
                                <th>reservationSüresi</th>
                                <th>Ödenecek</th>
                                <th>Servis Adresi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($oldReservations as $rezv )
                            <tr>
                                <td></td>
                                <td>{{ $rezv->stage->name }} </td>
                                <td>
                                    @if($rezv->stage->type ==1)
                                        Tek'li Kort
                                    @else
                                        Çift'li Kort
                                    @endif
                                </td>

                                <td>{{ $rezv->start_at }} </td>
                                <td>{{ $rezv->renter->name }}</td>
                                <td>{{ $rezv->renter->phone }}</td>
                                <td>1 hour</td>
                                <td>{{ $rezv->payable}}</td>
                                <td>@if($rezv->service_address){{$rezv->service_address}}@else Servis Kullanilmadi @endif</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
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
                @if($tumgelecekler)
                <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>Kort tipi</th>
                                <th>start_at</th>
                                <th>reservationEden</th>
                                <th>reservationTel</th>
                                <th>reservationSüresi</th>
                                <th>Ödenmiş</th>
                                <th>Servis surucusu</th>
                                <th>Servis Adresi</th>

                            </tr>
                        </thead>
                        <tbody>
                             @foreach($tumgelecekler as $rezv )
                            <tr>
                                <td></td>
                                <td>{{ $rezv->stage->name }}</td>
                                <td>
                                    @if($rezv->stage->type ==1)
                                        Tek'li Kort
                                    @else
                                        Çift'li Kort
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse( $rezv->start_at)->toTimeString()}}</td>
                                <td>{{ $rezv->renter->name }}</td>
                                <td>{{ $rezv->renter->phone }}</td>
                                <td>1 hour</td>
                                <td>{{ $rezv->payable}}</td>
                                <td>{{ $rezv->service->driver_name}}</td>
                                <td>@if($rezv->service_address){{$rezv->service_address}}@else Servis Kullanilmayacaktir @endif</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
