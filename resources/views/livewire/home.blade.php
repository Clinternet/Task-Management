<div>
    
    <div class="container">
        <div class="h" id="h1">
            To Do
        </div>

        <div class="h" id="h2">
            In Progress
        </div>

        <div class="h" id="h3">
            Done

        </div>


        <div id="left"> 
            @foreach ($products as $product)
                        
            <div>
                
                <div class="list" draggable="true" id="borderlist" clas>
                    <p class="text-2xl font-bold" id="borderlist">{{ $product->name }} 
                        <div id="info">
                            {{ $product->price }}
                            {{ $product->category }}

                            <button class="delete-btn" wire:click="deleteProduct({{ $product->id }})">
                                <i class=""></i> Delete
                            </button>
                        </div>
                        
                
                        
                    </p>

                </div>

                
                
            </div>
            
              

            @endforeach
        

            <div id="mid">
                
            </div>

            
            <div id="right">
                
            </div>

        
    </div>
       
        
            
</div>



<style>
    
*{
    background-color:rgb(214, 204, 204);
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}
.h{
    position: relative;
    bottom: 400px;
    font-size: 35px;
    font-family: cursive;
    border: 2px black solid;
    padding: 8px;
    
}
#h1{
    position: relative;
    left: 180px;
}
#h2{
    position: relative;
    left: 500px;
}
#h3{
    position: relative;
    left: 830px;
}
.delete-btn{
    margin-left: 15px;
}

#borderlist{
    min-height: 100px;
    width: 332px;
    word-wrap: break-word;
    background-color: #84AE92;
    border-top: 1px solid black;
    border-left: 1px solid black; 
    border-right: 2px solid black;
    
    
}
#info{
    width: 333px;
    height: 25px;
    word-spacing: 100px;
    display: flex;
    justify-content: center;
    position: relative;
    right: 1px;
    background-color: #84AE92;
    border-bottom: 2px solid black;
    border-left: 2px solid black; 
    border-right: 2px solid black;
    color: #57df85;
    font-style: italic;

}

.container{
    width: 2100px;
    min-height: 80vh;
    background: #84AE92;
    display: flex;
    align-items: center;
    border: 3px solid black;
    margin-left: 35px;
    
    
}
#left, #right, #mid{
    position: fixed;
    width: 400px;
    height: 600px;
    margin: 10px;
    border: 3px solid rgb(0, 0, 0);
    box-shadow: 16px 15px 10px -1px rgba(0,0,0,0.55);
    overflow: auto;
}
#left{
    position: fixed;
    left: 370px;
    
}

#mid{
    position: fixed;
    top: 175px;
    right: 630px;   
}
#right{
    position: fixed;
    bottom: 131px;
    right: 140px;
}

.list{
    height: 50px;
    margin: 30px;
    color: #000000;
    cursor: grab;
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



