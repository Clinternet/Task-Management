<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Login extends Component
{
    public $email;
    public $password;
    public $loginMessage;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $this->loginMessage = null;
    
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
    
        try {
            if(Auth::attempt($credentials)){
                $user = Auth::user();
        
                if($user->user_role == 'customer'){
                    return redirect()->route('/home');
                } elseif($user->user_role == 'admin'){
                    return redirect()->route('dashboard');
                }
            } else {
                $this->loginMessage = "Invalid Credentials";
            }
        } catch(Exception $e){
            throw $e;
        }
    }
}    