<?php

namespace App\Livewire\Admin;

use App\Models\Products as Prod;
use App\Models\Supplier;
use Exception;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title(content: 'Products')]
class Products extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $category;
    public $quantity;
    public $productImage;
    public $statusMessage;
    public $products;
    public $action ;
    public $product;
    public $suppliers;
    public $supplierID;
    public $search = '';

    public function mount() {
        $this->suppliers = Supplier::all();
    }

    public function render()
{
    $this->products = Supplier::join('products', 'products.supplier_id', '=', 'suppliers.id')
        ->select('products.*', 'suppliers.name as supplier_name')
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('products.name', 'like', '%' . $this->search . '%')
                  ->orWhere('products.category', 'like', '%' . $this->search . '%')
                  ->orWhere('products.id', 'like', '%' . $this->search . '%');
            });
        })
        ->get();

    return view('livewire.admin.products', [
        'products' => $this->products,
    ]);
}
    


    public function saveProduct(): void {
        $this->validate([
            'supplierID' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'quantity' => 'required|numeric',
        ]);

        
        $filename = $this->productImage->getClientOriginalName();
        $this->productImage->storeAs('product-images', $filename, 'public_uploads');
    
        try {

            if($this->action == 'edit'){
                $this->product->update([
                    'supplierID' => $this->supplierID,
                    'name' => $this->name,
                    'price' => $this->price,
                    'category' => $this->category,
                    'quantity' => $this->quantity,
                ]);
             
    

            }else{

                Prod::create([
                    'supplier_id' => $this->supplierID,
                    'name' => $this->name,
                    'price' => $this->price,
                    'category' => $this->category,
                    'file_path' => $filename,
                    'quantity' => $this->quantity,
                ]);
    

            }
            
            $this->resetVariable();

            $this->statusMessage = 'Product saved successfully!.';
    
    
        } catch (Exception $e) {
            throw $e;
        }
    }

    

    public function toggleEditProduct($id){
        $this->action = 'edit';

        $this->product = Prod::where('id', $id)->first();

        if($this->product){
            $this->name = $this->product->name;
            $this->price = $this->product->price;
            $this->category = $this->product->category;
            $this->quantity = $this->product->quantity;
        }
    }

    public function deleteProduct($id) {
        $this->product = Prod::where('id', $id)->first();
        if($this->product){
            $this->product->delete();

            $this->statusMessage = 'Product deleted successfully!.';
        }
    }
    
    public function resetVariable()
    {
        $this->name = null;
        $this->price = null;
        $this->category = null;
        $this->quantity = null;
        $this->product = null;
        $this->action = null;
    }
    
}
