@extends('appartments.template')
@section('title','product details')
@section('content')
    <br><br>
    <div class="row">
        <div class="col-3 h2">
            Product details
        </div>
        <div class="col">
            <a href="{{ route('appartments.index') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3 h5">Appartment name :</div>
        <div class="col">{{ $appartment->appartment_name }}</div>
    </div>
    <br>
    <div class="row">
        <div class="col-3 h5">Appartment Location :</div>
        <div class="col">{{ $appartment->location }}</div>
    </div>
    <br>
    {{-- <div class="row">
        <div class="col-3 h5">Appartment Size :</div>
        <div class="col">{{ $appartment-> }}</div>
    </div>
    <br> --}}
    <div class="row">
        <div class="col-3 h5">Appartment Price /monthe :</div>
        <div class="col">{{ $appartment->price }}</div>
    </div>
    <br>
    {{-- <div class="row">
        <div class="col-3 h5">Appartment Availability :</div>
        <div class="col">{{ $appartment->appartment_name }}</div>
    </div> --}}

@endsection