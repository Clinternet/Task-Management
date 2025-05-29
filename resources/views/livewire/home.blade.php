<div>
    
    <div class="container">
        
        
        <div id="left"> 
            TO Do
            @foreach ($products as $product)
                        
            <div>
                
                <div class="list" draggable="true" id="borderlist">
                    <p class="text-2xl font-bold">{{ $product->name }}</p>
                </div>
                
            </div>   

            @endforeach
        
        
            
            <div id="mid">
                In Progress
            </div>
            <div id="right">
                Done
            </div>

        </div> 
       
        
            
</div>





<style>
    
*{
    background-color: rgb(129, 129, 129);
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}

#borderlist{
    border: 2px solid black;
    min-height: 100px;
    
}

.container{
    width: 100%;
    min-height: 100vh;
    background: #689977;
    display: flex;
    align-items: center;
    border: 3px solid black;
}
#left, #right, #mid{
    position: fixed;
    width: 400px;
    height: 600px;
    margin: 10px;
    border: 2px solid white;
}

#mid{
    position: fixed;
    top: 192px;
    right: 100px;
    right: 680px;
}
#right{
    position: fixed;
    bottom: 151px;
    right: 170px;
}

.list{
    height: 50px;
    margin: 30px;
    color: #fff;
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



