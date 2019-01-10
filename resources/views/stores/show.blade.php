@extends('layouts.app')

@section('content')
    <div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img class="rounded img-fluid" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1683484b3d2%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1683484b3d2%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2298.6328125%22%20y%3D%2296.6046875%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="...">
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col-2 font-weight-bold">Rate:</div>
                        @for($i=0; $i<5; $i++)
                            @if($i < $item->rate)
                                <p class="fa fa-star star-checked"></p>
                            @else
                                <p class="fa fa-star"></p>
                            @endif
                            
                        @endfor
                    </div>
                    <div class="row">
                        <div class="col-2 font-weight-bold">Name:</div>
                        <div class="col-2 "> {{$item->name}}</div>
                    </div>
                    <div class="row">
                        <div class="col-2 font-weight-bold">Address:</div>
                        <div class="col-2"> {{$item->address}}</div>
                    </div>
                    <div class="row">
                        <div class="col-2 font-weight-bold">Phone Number:</div>
                        <div class="col-2"> {{$item->phone_number}}</div>
                    </div>
                    <div class="row">
                        <div class="col-2 font-weight-bold">Website:</div>
                        <div class="col-2"><a href="{{$item->website}}">Click Here</a></div>
                    </div>
                    @auth
                        <div class="row">
                            <div class="col">
                                <ul class="list-inline">
                                  <li class="list-inline-item"><a href="{{ route('store.edit',$item->id)}}" class="btn btn-primary">Edit</a></li>
                                  <li class="list-inline-item">
                                    <form action="{{ route('store.destroy', $item->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </ul>
                            </div>
               
                        </div>
                    @endauth

                </div>
            </div>

        </div>
    </div>
@endsection