@extends('layouts.admin')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
 
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Sonraki Dilim Zamanındaki Kortlar</h5>
                </div>
                <div class="ibox-content">
                   @if($nextReservations)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kort</th>
                                <th>reservationEden</th>
                                <th>reservationTel</th>
                                <th>reservationSüresi</th>
                                <th>Ödenecek</th>
                                <th>Servis Adresi</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($nextReservations as $rezv )
                            <tr>
                                <td> </td>
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
                                <td>{{ $rezv->payable}}</td>
                                <td>{{ $rezv->service_address }}</td>

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
</div>

@endsection
