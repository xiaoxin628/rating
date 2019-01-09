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
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Stock Name</td>
                <td>Stock Price</td>
                <td>Stock Quantity</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
                @foreach($stores as $store)
                    <tr>
                        <td>{{$store->id}}</td>
                        <td>{{$store->name}}</td>
                        <td>{{$store->address}}</td>
                        <td>{{$store->phone_number}}</td>
                        <td><a href="$store->website"> website</a></td>
                        <td>{{$store->created_at}}</td>
                        @auth
                            <td><a href="{{ route('store.edit',$store->id)}}" class="btn btn-primary">Edit</a></td>
                        @endauth

                    </tr>
                @endforeach
            </tbody>
        </table>
            <div>
                {{ $stores->links() }}
            </div>
        <div>
    php
@endsection