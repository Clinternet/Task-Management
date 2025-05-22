<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
    ];

    public function items()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function billing()
    {
        return $this->hasOne(Billing::class);
    }

}
