<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prouduct extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'slug',
        'description',
        'price',
        'old_price',
        'in_stock',
        'qty',
        'picture',
        'categories_id'
    ];
    public function getRouteKeyName()
    {
        return 'product_name';
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'category_id');
    }
}