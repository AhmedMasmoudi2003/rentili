@extends('app')
@section('title', 'list of Appartments')
@section('content')
<div class="row">
    <div class="col-6">
        <h2>Manage <b>Appartments</b></h2>
    </div>
    <div class="col">
        <a href="{{route('appartments.create')}}" class="btn btn-success">
            add a new appartment
        </a>
    </div>
</div>

@if(@session()->has('info'))
    <div class="alert alert-success">
        {{@session('info')}}
    </div>
@endif

<div class="row">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>name</th>
                <th>location</th>
                <th>price</th>
                <th>client name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appartments as $appartment)
            <tr>
                <td>{{$appartment->name}}</td>
                <td>{{$appartment->location}}</td>
                <td>{{$appartment->price}}</td>
                <td>{{$appartment->client_name}}</td>
                <td><a href="{{route('appartments.show', $appartment)}}" class="btn btn-info">Open</a></td>
                <td><a href="{{route('appartments.edit', $appartment)}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{route('appartments.destroy', $appartment)}}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$products->links("pagination::bootstrap-5")}}
@endsession