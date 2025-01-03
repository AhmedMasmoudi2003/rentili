@extends('appartments.template')
@section('title', 'list of Appartments')
@section('content')
<br><br>
<div class="row">
    <div class="col-6">
        <h2>Manage <b>Appartments</b></h2>
    </div>
    <div class="col text-end">
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
                <td>{{$appartment->client->name}}</td>
                <td><a href="{{route('appartments.show', $appartment)}}" class="btn btn-primary">Open</a></td>
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