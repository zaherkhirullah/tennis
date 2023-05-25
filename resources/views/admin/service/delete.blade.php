@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                            @if(Route::is('service.delete'))
                            Delete 
                            @else
                            Aktif 
                            @endif
                             <span class="text-danger"> {{ $servi->name }} </span> service
                    </h2>
                </div>
                <div class="panel panel-body card-body">
                    <div class="col-md-8 col-md-offset-2">
                    @if(Route::is('service.delete'))
                    <h4 class="text-danger">{{ $servi->name }} servicei Silmek istediğine emin misiniz ?</h4>
                    <form action="{{ route('service.p_delete',$servi) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-2x fa-trash"></i> Sil</button>
                    </div>
                    </form>
                    @elseif(Route::is('service.restore'))
                    <h4 class="text-success">{{ $servi->name }} servicei aktiflemek istediğine emin misiniz ?</h4>
                    <form action="{{ route('service.p_restore',$servi) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-2x fa-check"></i> aktif</button>
                    </div>
                    </form>
                    @endif
                    <a href="{{ route('service.index') }}" class="btn btn-default">geri dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
