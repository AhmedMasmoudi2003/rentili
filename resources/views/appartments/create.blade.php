@extends('appartments.template')

@section('content')
<div class="row">
    <div class="col-6 h2">Create a new appartment</div>
    <div class="col">
        <a class="btn btn-primary" href="{{ route('appartments.index')}}">Retour</a>
    </div>
</div>

<form action="{{ route('appartments.store') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="appartment_name">Name :</label>
        <input type="text" name="appartment_name" id="appartment_name" class="form-control" value="{{old('appartment_name')}}" required>
        @error('appartment_name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="location">location :</label>
        <input type="text" name="location" id="location" class="form-control" value="{{old('location')}}" required>
        @error('location')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="price">price :</label>
        <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}" required>
        @error('price')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="client_name">client name :</label>
        <textarea name="client_name" id="client_name" class="form-control" required>{{old('client_name')}}</textarea>
        @error('client_name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <br>
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Validate</button>
    </div>
</form>
@endsection