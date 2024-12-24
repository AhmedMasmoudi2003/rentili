@extends('appartments.template')
@section('title', 'list of Appartments')

@section('search')
<form class="d-flex" role="search" action="{{route('appartments.search')}}" method="POST">
    @csrf
    <input class="form-control mx-2 mr-sm-2 py-sm-0" name="keyword" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
@endsection

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
<br>
@if(@session()->has('info'))
    <div class="alert alert-success">
        {{session('info')}}
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
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appartments as $appartment)
            <tr>
                <td>{{$appartment->appartment_name}}</td>
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
{{$appartments->links("pagination::bootstrap-5")}}
@endsection