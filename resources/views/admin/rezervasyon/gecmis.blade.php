@extends('layouts.admin')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    
 
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tüm Geçmiş Rezevasyonlar</h5>
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
                                <th>Servis Plakası</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gecmisler as $rezv )
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
                                {{--<td>1 saat</td>--}}
                                <td>{{ $rezv->odenecek}}</td>
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
