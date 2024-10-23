<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, );
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'order_id');
    }
    public function scopeFilter($query)
    {
        return $query->
            when(request()->has('search'), function ($q): mixed {
                return $q->where('unique_id', request('search'))->orWhereHas('user', function ($query) {
                    $query->where('phone', request('search'));
                });
            })
            ->when(request()->has('total_price'), function ($q) {
                $q->orderByDesc('total_price');
            })
            ->when(request()->has('paid_price'), function ($q) {
                $q->orderByDesc('paid_price');
            })
            ->when(request()->has('due'), function ($q) {
                $q->orderByDesc('due');
            })

        ;
    }
    public function scopeUser_filter($query)
    {
        return $query->
            when(request()->has('search'), function ($q): mixed {
                return $q->where('unique_id', request('search'));
            })
            ->when(request()->has('total_price'), function ($q) {
                $q->orderByDesc('total_price');
            })
            ->when(request()->has('paid_price'), function ($q) {
                $q->orderByDesc('paid_price');
            })
            ->when(request()->has('due'), function ($q) {
                $q->orderByDesc('due');
            })

        ;
    }
}
