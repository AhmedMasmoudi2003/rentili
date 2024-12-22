@extends('layout')
@section("title","Clients")
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-75">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
        <h1 class="text-center mb-4">updating a Client Information</h1>
    @include('Client._form', [
        'action' => route('clients.update', $client->id),
        'method' => 'PUT',
        'client' => $client,
        'buttonText' => 'Update Client'
    ])
    </div>
</div>
@endsection