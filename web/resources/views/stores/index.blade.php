@extends('layouts.app')

@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif


    <div class="card-columns">
        @foreach($stores as $store)
        <div class="card">
            <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1683484b3d2%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1683484b3d2%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2298.6328125%22%20y%3D%2296.6046875%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
            <div class="card-body">
                <p>
                        @for($i=0; $i<5; $i++)
                            @if($i < $store->rate)
                                <p class="fa fa-star star-checked"></p>
                            @else
                                <p class="fa fa-star"></p>
                            @endif
                        @endfor
                    </p>
                <p class="card-text"><a href="{{route('store.show', ['id'=>$store->id])}}">{{$store->name}}</a></p>
            </div>
        </div>
        @endforeach
    </div>
    
    <div>
        {{ $stores->links() }}
    </div>
    <div>
        @endsection

