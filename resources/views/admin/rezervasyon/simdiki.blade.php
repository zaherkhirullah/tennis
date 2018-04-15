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
  
</div>

@endsection
