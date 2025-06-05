<div class="login-form">
    <style>
            

            body{
                background-image: url("images/background.jpg");
                background-repeat: no-repeat;
                background-size: 100%; 
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }
            .login-form{
                width: 500px !important;
                height: 500px !important;
                border-radius: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 170px;
                margin-left: 160px;
                border: black 3px solid;
                
            }
            #login{
                text-align: center;
                font-size: 40px;
                margin-top: 20px;
            }
            .login-form input{
                width: 80%;
                height: 40px;
                margin-left: 50px;
                font-size: 15px;
                border-radius: 10px;
                border: 1px solid rgb(0, 0, 0);
            }
            
            .login-btn{
                width: 40%;
                height: 50px;
                font-size: 20px;
                border-radius: 10px;
                background: green;
                color: white;
                border: none;
                margin-left: 150px;
                
            }
            .login-btn:hover{
                background-color: gray;
            }
            
            .login-message {
                font-size: 4px; 
                font-weight: normal; 
                display: relative;
                margin-left: 50px;
            }
            
            .login-message.success {
                color: green;
            }
            
            .login-message.error {
                color: red;
            
            }
            .antialiased{
                justify-content: center;
                margin-left: 500px;
            }
                </style>
    
    
        <form wire:submit.prevent="login" style="width: 100%">
            <p id="login">Login</p>
    
            <div style="width: 100%; height: 80px">
                
                <input type="text" wire:model="email" placeholder="Email" >
                @error('email')
                    <p style="font-size: 14px; color: red;">{{ $message }}</p>
                @enderror
            </div>
    
            <div style="width: 100%; height: 80px">
                <input type="password" wire:model="password" placeholder="Password">
                @error('password')
                    <p style="font-size: 14px; color: red;">{{ $message }}</p>
                @enderror
            </div>
    
            <button type="submit" class="login-btn">Login</button>
            <p style="font-size: 14px; color: red;">{{ $loginMessage }}</p>
            <a href="/register">Don't have an account?</a>
        </form>
    </div>
    