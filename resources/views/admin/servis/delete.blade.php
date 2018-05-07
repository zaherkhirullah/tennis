@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                            @if(Route::is('servis.delete'))
                            Delete 
                            @else
                            Aktif 
                            @endif
                             <span class="text-danger"> {{ $servi->isim }} </span> servis
                    </h2>
                </div>
                <div class="panel panel-body card-body">
                    <div class="col-md-8 col-md-offset-2">
                    @if(Route::is('servis.delete'))
                    <h4 class="text-danger">{{ $servi->isim }} servisi Silmek istediğine emin misiniz ?</h4>
                    <form action="{{ route('servis.p_delete',$servi) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-2x fa-trash"></i> Sil</button>
                    </div>
                    </form>
                    @elseif(Route::is('servis.restore'))
                    <h4 class="text-success">{{ $servi->isim }} servisi aktiflemek istediğine emin misiniz ?</h4>
                    <form action="{{ route('servis.p_restore',$servi) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-2x fa-check"></i> aktif</button>
                    </div>
                    </form>
                    @endif
                    <a href="{{ route('servis.index') }}" class="btn btn-default">geri dön</a>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
