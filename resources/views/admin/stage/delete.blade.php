{{-- @extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Delete   {{ $stage->name }} Kort</div>

                <div class="card-body">
                    Are You Sure You Want to delete this asshole stage!
                    <form action="{{ route('stage.destroy',$stage) }}" method="post">
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
                            @if(Route::is('stage.delete'))
                            Delete 
                            @else
                            Aktif 
                            @endif
                             <span class="text-danger"> {{ $stage->name }} </span> stage
                    </h2>
                </div>
                <div class="panel panel-body card-body">
                    <div class="col-md-8 col-md-offset-2">
                    @if(Route::is('stage.delete'))
                    <h4 class="text-danger">{{ $stage->name }} stagei Silmek istediğine emin misiniz ?</h4>
                    <form action="{{ route('stage.p_delete',$stage) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-2x fa-trash"></i> Sil</button>
                    </div>
                    </form>
                    @elseif(Route::is('stage.restore'))
                    <h4 class="text-success">{{ $stage->name }} stagei aktiflemek istediğine emin misiniz ?</h4>
                    <form action="{{ route('stage.p_restore',$stage) }}" method="post">
                        @csrf
                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-2x fa-check"></i> aktif</button>
                    </div>
                    </form>
                    @endif
                    <a href="{{ route('stage.index') }}" class="btn btn-default">geri dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

