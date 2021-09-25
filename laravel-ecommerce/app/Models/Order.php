<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'qentity',
        'product_name',
        'price',
        'price_total',
        'paid',
        'delivered',
        'user_id',
    ];
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}