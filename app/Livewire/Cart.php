<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Cart')]
class Cart extends Component
{
    public $cart;

    public function mount()
    {
        // Initialize cart from session
        $this->cart = session()->get('cart', []);
    }

    public function removeFromCart($productId)
    {
        // Retrieve the cart from session
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Remove the product from the cart
            unset($cart[$productId]);
            // Update the session
            session()->put('cart', $cart);
            // Update the component's cart property
            $this->cart = $cart;
            // Provide feedback
            session()->flash('message', 'Product removed from cart.');
        }
    }

    public function render()
    {
        return view('livewire.cart');

    }
    
}