<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Supplier;
use App\Models\Products; 

#[Layout('layouts.app')]
#[Title(content: 'Home')]
class Home extends Component
{
    public $name;
    public $search;

    public function render()
    {

        $products = Supplier::join('products', 'products.supplier_id', '=', 'suppliers.id')
        ->select(
            'products.*', 
            'suppliers.name as supplier_name'
        )
        ->when($this->search, function($query){
            return $query->search(trim($this->search));
        })
        ->get();

        return view(view: 'livewire.home', data:[
            'products' => $products
        ]);
    }

    public function addToCart($productId)
    {
        $product = Products::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'file_path' => $product->file_path ?? 'default.jpg',
            ];
        }

        session()->put('cart', $cart);
        session()->flash('success', $product->name . ' added to cart!');
    }

    
}
