<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\Billing;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Layout('layouts.app')]
#[Title(content: 'Billing')]
class BillingPage extends Component
{
    public $billing_address, $payment_method;
    public $latestPurchase;


    


    public function mount()
    {
        $this->latestPurchase = Purchase::where('user_id', auth()->id())
            ->latest()
            ->first();
    }

    public function submitBilling()
    {
        $this->validate([
            'billing_address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:50',
        ]);

        Billing::create([
            'purchase_id' => $this->latestPurchase->id,
            'billing_address' => $this->billing_address,
            'payment_method' => $this->payment_method,
        ]);

        session()->flash('success', 'Billing details saved successfully!');
    }

    public function render()
    {
        return view('livewire.billing-page');
    }
}
