
<div>

    <div class="flex justify-center items-start p-8 gap-6 w-full">
        <p id="search">Search Product</p>
    <input class="bg-gray-100 py-2 px rounded-md border border-gray-100" type="text" wire:model.live='search' id="input">
    </div>
    
    
    <div class="flex justify-center items-start p-8 gap-6 w-full">
        @foreach ($products as $product)
        <div class="card">
            <div class="card-inner">
                
                <div class="card-front">
                    
            <div class="rounded-lg border border-gray-300 bg-green-100 flex-1 overflow-hidden drop-shadow-lg" id="boxes">
                <img src="{{ asset('uploads/product-images/' . $product->file_path) }}" alt="Product Image" style="width: 200px">
                
                    <p class="text-2xl font-bold">{{ $product->name }}</p>
                    <p>Price:{{ $product->price }}</p>
                    <p>Quantity:{{ $product->quantity }}</p>
                    <p>Brand:{{ $product->category }}</p>
                    
                    <button
                        wire:click="addToCart({{ $product->id }})"
                        class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-5 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-400 transition-all duration-300">
                        <i class="fa-solid fa-cart-shopping" id="add"></i>
                       
                        
                    </button>

                    <div class="card-back">
                        
                    
                    </div>

                </div>
                    </div>
                        </div>
            </div>
        @endforeach
    </div>


    <style>
        #boxes{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 2px;
            height: 30%;
            
        }
        #input{
            border: 2px solid black;
        }
        
    
        

    </style>
</div>


