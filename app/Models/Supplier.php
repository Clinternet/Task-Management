<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'tel_number',
        'mobile_number',
        'email',
    ];

    public function products() {
        return $this->hasMany(Products::class);
    }

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('products.name', 'like', $term)
            ->orWhere('products.category', 'like', $term);
            
        });
    }

}
