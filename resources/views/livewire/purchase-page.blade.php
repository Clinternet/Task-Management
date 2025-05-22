<div class="container mt-5">
    <h2>Review Purchase</h2>

    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                
                @php $total = 0; @endphp
                
                @foreach(session('cart') as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>₱{{ number_format($item['price'], 2) }}</td>
                        <td>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                    @php $total += $item['price'] * $item['quantity']; @endphp
                @endforeach
            </tbody>
        </table>

        <h4>Total: ₱{{ number_format($total, 2) }}</h4>

        <!-- Confirm Purchase Button -->
        <button wire:click="savePurchase" class="btn btn-success mt-3">Confirm Purchase</button>
    @else
        <p>Your cart is empty.</p>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
