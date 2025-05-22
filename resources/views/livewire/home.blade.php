
<div>

    <div class="flex justify-center items-start p-8 gap-6 w-full">
        <p id="search">Search Product</p>
    <input class="bg-gray-100 py-2 px rounded-md border border-gray-100" type="text" wire:model.live='search' id="input">
    </div>
    
    <div class="container">
    <div class="flex justify-center items-start p-8 gap-6 w-full">
        @foreach ($products as $product)
        
        <div class="card">
            <div class="card-inner">
                
                <div class="card-front">
                    
            <div class="rounded-lg border border-gray-300 bg-green-100 flex-1 overflow-hidden drop-shadow-lg" id="boxes">
                <img src="{{ asset('uploads/product-images/' . $product->file_path) }}" alt="Product Image" style="width: 200px">
                <div id="left">
                    <div class="list" draggable="true"><p class="text-2xl font-bold">{{ $product->name }}</p>
                        <div class="list" draggable="true"><p>Price:{{ $product->price }}</p>
                            <div class="list" draggable="true"><p>Quantity:{{ $product->quantity }}</p>
                                <div class="list" draggable="true"><p>Brand:{{ $product->category }}</p>
                </div>
                    <button
                        wire:click="addToCart({{ $product->id }})"
                        class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-5 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-400 transition-all duration-300">
                        <i class="fa-solid fa-cart-shopping" id="add"></i>
                       
                        
                    </button>

                    <div id="mid">

                    </div>
            
                    <div id="right">
            
                    </div>

                </div>
                    </div>
                        </div>
            </div>
        @endforeach
    </div>
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
        .container{
            border: 2px solid black;
            width: 500px;
            height: 700px;
        }
        *{
    background-color: beige;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}
.container{
    width: 100%;
    min-height: 100vh;
    background: #cac6d8;
    display: flex;
    align-items: center;
    justify-content: center;
}
#left, #right, #mid{
    width: 300px;
    min-height: 400px;
    margin: 20px;
    border: 2px solid white;
}

.list{
    background: #e91e63;
    height: 60px;
    margin: 30px;
    color: #fff;
    display: flex;
    align-items: center;
    cursor: grab;
}
.list img{
    width: 30px;
    margin-right: 15px;
    margin-left: 20px;
}
        
    
        

    </style>

<script>
    let lists = document.getElementsByClassName("list")
    let rightbox = document.getElementById("right")
    let leftbox = document.getElementById("left")
    let midbox = document.getElementById("mid")

    for(list of lists){
        list.addEventListener("dragstart", function(e){
            let selected = e.target;

            rightbox.addEventListener("dragover", function(e){
                e.preventDefault();
            });
            rightbox.addEventListener("drop", function(e){
                rightbox.appendChild(selected);
                selected = null; 
            });
            leftbox.addEventListener("dragover", function(e){
                e.preventDefault();
            });
            leftbox.addEventListener("drop", function(e){
                leftbox.appendChild(selected);
                selected = null; 
            });
            midbox.addEventListener("dragover", function(e){
                e.preventDefault();
            });
            midbox.addEventListener("drop", function(e){
                midbox.appendChild(selected);
                selected = null; 
            });
            
        })
    }
</script>
</div>


