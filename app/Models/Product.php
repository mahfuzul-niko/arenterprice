<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'total_price');
    }
    public function scopeProduct($query, $search)
    {
        return $query->where('product_name', 'LIKE', "%{$search}%")
            ->orWhere('brand_name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%");
    }
}
