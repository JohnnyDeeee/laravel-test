<h1>Create New Coffee</h1>

<form method="POST" action="{{ url('/api/coffee') }}">
    @csrf

    <div>
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="origin">Origin</label><br>
        <input type="text" name="origin" id="origin" value="{{ old('origin') }}" required>
        @error('origin')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="roast_date">Roast Date</label><br>
        <input type="date" name="roast_date" id="roast_date" value="{{ old('roast_date') }}" required>
        @error('roast_date')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="stock">Stock</label><br>
        <input type="number" name="stock" id="stock" value="{{ old('stock') }}" min="0" required>
        @error('stock')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" style="margin-top:10px;">Create Coffee</button>
</form>