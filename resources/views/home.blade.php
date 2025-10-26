<x-layout>
    <h2>Coffees</h2>
    <div>
        @foreach ($coffees as $coffee)
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                <strong>{{ $coffee->name }}</strong><br />
                Origin: {{ $coffee->origin }}<br />
                Roast Date: {{ $coffee->roast_date->format('F j, Y') }}<br />
                Stock: {{ $coffee->stock }}<br />
                Suppliers:
                @if($coffee->suppliers->isNotEmpty())
                    {{ $coffee->suppliers->pluck('name')->join(', ') }}
                @else
                    None
                @endif
            </div>
        @endforeach
    </div>

    <h2>Suppliers</h2>
    <div>
        @foreach ($suppliers as $supplier)
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                <strong>{{ $supplier->name }}</strong><br />
                @if($supplier->coffees->isNotEmpty())
                    Amount of coffees: {{ $supplier->coffees->count() }}<br />
                        @foreach ($supplier->coffees as $coffee)
                            {{ $coffee->name }} ({{ $coffee->stock }})<br />
                        @endforeach
                @else
                    None
                @endif
            </div>
        @endforeach
    </div>
</x-layout>
