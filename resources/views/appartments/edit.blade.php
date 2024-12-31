@extends('appartments.template')
@section('title', 'Edit an appartment')
@section('content')

    <br><br>
    <center>
    <div class="row justify-content-between align-items-center mb-4"style="max-width: 600px;">
        <div class="col-auto">
            <h2 class="mb-0">Edit an appartment</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('appartments.index') }}" class="btn btn-primary">Return</a>
        </div>
    </div>
    </center>
    <div class="container text-center" style="max-width: 600px;">
        
        <form action="{{ route('appartments.update', $appartment) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="appartment_name" class="form-label">Appartment name:</label>
                <input type="text" name="appartment_name" id="appartment_name" class="form-control" value="{{ $appartment->appartment_name }}">
                @error('appartment_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Appartment location:</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $appartment->location }}">
                @error('location')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="col-md-6">
            <label for="size"> Apparment size :</label>
            <input type="text" name="size" id="size" class="form-control" value="{{$appartment->size}}">
            @error('size')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>--}}
            <div class="mb-3">
                <label for="price" class="form-label">Appartment price:</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $appartment->price }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="col-md-6">
            <label for="availability"> Apparment availability :</label>
            <input type="text" name="availability" id="availability" class="form-control" value="{{$appartment->availability}}">
            @error('availability')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div> --}}
            <button class="btn btn-primary">Validate</button>
        </form>
    </div>
    <br><br>
@endsection
