<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

#[Layout('layouts.app')]
class Register extends Component
{
    public $name, $email, $password, $cpassword;

    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ]);

        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'user_role' => 'customer',
            ]);

            $this->resetVariables();

            return redirect()->route('/');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function resetVariables(): void{
        $this->email = null;
        $this->password = null;
        $this->cpassword = null;
    }
}