@extends('layouts.admin')

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
@endsection
