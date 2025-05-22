<div class="login-form">
    <style>
            

            .login-form{
                width: 400px !important;
                height: 500px !important;
                background: rgb(156, 123, 123);
                border-radius: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px;
                gap: 15px;
                margin-top: 170px;
                margin-left: 140px;
            }
            
            .login-form input{
                width: 100%;
                height: 40px;
                border-radius: 10px;
                border: 1px solid rgb(189, 17, 189);
            }
            
            .login-btn{
                width: 100%;
                height: 40px;
                border-radius: 10px;
                background: green;
                color: white;
                border: none;
            }
            
            .login-form p{
                font-size: 28px;
                color: rgb(32, 32, 32);
                font-weight: bold;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
            }
            
            .login-message {
                font-size: 14px; 
                font-weight: normal; 
                text-align: center;
                margin-top: 10px;
            }
            
            .login-message.success {
                color: green;
            }
            
            .login-message.error {
                color: red;
            
            }
                </style>
    
        <form wire:submit.prevent="login" style="width: 100%">
            <p>Login</p>
    
            <div style="width: 100%; height: 80px">
                <label>Email</label>
                <input type="text" wire:model="email">
                @error('email')
                    <p style="font-size: 14px; color: red;">{{ $message }}</p>
                @enderror
            </div>
    
            <div style="width: 100%; height: 80px">
                <label>Password</label>
                <input type="password" wire:model="password">
                @error('password')
                    <p style="font-size: 14px; color: red;">{{ $message }}</p>
                @enderror
            </div>
    
            <button type="submit" class="login-btn">LogIn</button>
            <p style="font-size: 14px; color: red;">{{ $loginMessage }}</p>
            <a href="/register">Don't have an account?</a>
        </form>
    </div>
    