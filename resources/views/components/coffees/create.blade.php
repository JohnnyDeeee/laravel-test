@props(['suppliers' => []])

<h1>Create New Coffee</h1>

<form id='create-coffee-form'>
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

    <div>
        <label for="supplier">Supplier</label><br>
        <select name="supplier" id="supplier" required>
            @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
        @error('stock')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" style="margin-top:10px;">Create Coffee</button>
</form>

<script>
    document.getElementById('create-coffee-form').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries()); // convert to object

        try {
            const response = await fetch('/api/coffee', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) throw new Error('Failed to create coffee');

            alert('Coffee created successfully!');
            // redirect or reset form as needed
        } catch (error) {
            alert(error.message);
        }
    });
</script>
