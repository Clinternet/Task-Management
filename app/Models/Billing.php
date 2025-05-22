<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'billing_address',
        'payment_method',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}