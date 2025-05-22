

<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Billing Details</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORM START -->
    <form wire:submit.prevent="submitBilling" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" id="bill">Billing Address</label>
            <input type="text" wire:model="billing_address" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            @error('billing_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
            <select wire:model="payment_method" class="w-full border rounded px-3 py-2 bg-white focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">-- Select --</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Gcash">Gcash</option>
                <option value="Credit Card">Credit Card</option>
            </select>
            @error('payment_method') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded" id="sbmt">
            Submit Billing
        </button>
    </form><br><br>

    @if ($latestPurchase)
        <div class="bg-white shadow-md rounded-lg mt-8 p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Purchase Summary</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-4 py-2 border-b">Product</th>
                            <th class="px-4 py-2 border-b">Qty</th>
                            <th class="px-4 py-2 border-b">Price</th>
                            <th class="px-4 py-2 border-b">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @php $total = 0; @endphp
                        @foreach($latestPurchase->items as $item)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $item->product->name ?? 'Unknown Product' }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->quantity }}</td>
                                <td class="px-4 py-2 border-b">₱{{ number_format($item->price, 2) }}</td>
                                <td class="px-4 py-2 border-b">₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @php $total += $item->price * $item->quantity; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-right mt-4">
                <h4 class="text-lg font-bold">Total: ₱{{ number_format($total, 2) }}</h4>
            </div>
        </div>
    @endif
    <style>
        .main-container{
            border: 2px solid black;
            width: 600px;
            height: 600px;
            margin: auto;
            position: relative;
            top: 100px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9);
        }
        #sbmt{
            border: 2px solid black;
            width: 200px;
            position: relative;
            top: 20px;
            left: 40%;
        }
        #sbmt:hover{
            font-size: 18px;
            
        }
        </style>
</div>


