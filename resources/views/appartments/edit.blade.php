@extends('appartments.template')
@section('title','edit an appartment')
@section('content')

    <br><br>
    <div class="row">
        <div class="col-6 h2">Edit an appartment</div>
        <div class="col">
            <a href="{{route('appartments.index')}}" class="btn btn-primary">Return</a>
        </div>
    </div>
    <br>
    <form action="{{ route('appartments.update', $appartment)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="appartment_name"> Apparment name :</label>
            <input type="text" name="appartment_name" id="appartment_name" class="form-control" value="{{$appartment->appartment_name}}">
            @error('appartment_name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <br>
        <div class="col-md-6">
            <label for="location"> Apparment location :</label>
            <input type="text" name="location" id="location" class="form-control" value="{{$appartment->location}}">
            @error('location')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <br>
        {{-- <div class="col-md-6">
            <label for="size"> Apparment size :</label>
            <input type="text" name="size" id="size" class="form-control" value="{{$appartment->size}}">
            @error('size')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div> 
        <br>--}}
        <div class="col-md-6">
            <label for="price"> Apparment price :</label>
            <input type="text" name="price" id="price" class="form-control" value="{{$appartment->price}}">
            @error('price')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <br>
        {{-- <div class="col-md-6">
            <label for="availability"> Apparment availability :</label>
            <input type="text" name="availability" id="availability" class="form-control" value="{{$appartment->availability}}">
            @error('availability')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div> 
        <br>--}}
        <div class="col-md-6">
            <button class="btn btn-primary">Validate</button>
        </div>
    </form>

@endsection