@extends('layout')
@section('content')
<div class="container mt-4">
    <h2>Client Details</h2>
    <div class="card mt-4">
        <div class="card-header">Details for {{ $client->name }}</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $client->name }}</p>
            <p><strong>Email:</strong> {{ $client->email }}</p>
            <p><strong>Phone:</strong> {{ $client->phone ?? 'N/A' }}</p>
            <p><strong>CIN:</strong> {{ $client->CIN }}</p>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
