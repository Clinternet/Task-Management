<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Session;

#[Layout('layouts.app')]
#[Title(content: 'PurchasePage')]
class PurchasePage extends Component
{


    public function savePurchase()
{
    $cart = session('cart', []);

    if (empty($cart)) {
        session()->flash('error', 'Cart is empty.');
        return;
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Create the purchase record
    $purchase = Purchase::create([
        'user_id' => auth()->id(),
        'total' => $total
    ]);

    // Create the purchase items
    foreach ($cart as $productId => $item) {
        PurchaseItem::create([
            'purchase_id' => $purchase->id,
            'product_id' => $productId,
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ]);
    }

    session()->forget('cart');  // Clear the cart after purchase

    // Redirect to billing page with the purchase ID
    return redirect()->route('billing.page', ['purchase_id' => $purchase->id]);
}

    public function render()
    {
        return view('livewire.purchase-page');
    }
}
