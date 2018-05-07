{{-- @extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Delete   {{ $kort->isim }} Kort</div>

                <div class="card-body">
                    Are You Sure You Want to delete this asshole kort!
                    <form action="{{ route('kort.destroy',$kort) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" value="delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                            @if(Route::is('kort.delete'))
                            Delete 
                            @else
                            Aktif 
                            @endif
                             <span class="text-danger"> {{ $kort->isim }} </span> kort
                    </h2>
                </div>
                <div class="panel panel-body card-body">
                    <div class="col-md-8 col-md-offset-2">
                    @if(Route::is('kort.delete'))
                    <h4 class="text-danger">{{ $kort->isim }} korti Silmek istediğine emin misiniz ?</h4>
                    <form action="{{ route('kort.p_delete',$kort) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-2x fa-trash"></i> Sil</button>
                    </div>
                    </form>
                    @elseif(Route::is('kort.restore'))
                    <h4 class="text-success">{{ $kort->isim }} korti aktiflemek istediğine emin misiniz ?</h4>
                    <form action="{{ route('kort.p_restore',$kort) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-2x fa-check"></i> aktif</button>
                    </div>
                    </form>
                    @endif
                    <a href="{{ route('kort.index') }}" class="btn btn-default">geri dön</a>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

