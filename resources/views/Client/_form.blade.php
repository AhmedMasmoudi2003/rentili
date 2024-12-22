<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="form-group mb-3">
        <label for="name">Name:</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            class="form-control" 
            value="{{ old('name', $client->name ?? '') }}" 
            required
        >
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input 
            type="email" 
            id="mail" 
            name="mail" 
            class="form-control" 
            value="{{ old('mail', $client->mail ?? '') }}" 
            required
        >
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="phone">Phone:</label>
        <input 
            type="text" 
            id="phone" 
            name="phone" 
            class="form-control" 
            value="{{ old('phone', $client->phone ?? '') }}"
        >
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="address">CIN:</label>
        <input
            type="password"
            id="CIN" 
            name="CIN" 
            class="form-control"
            value="{{ old('CIN', $client->CIN ?? '') }}"
            required
        >
        @error('CIN')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    </div>
</form>
