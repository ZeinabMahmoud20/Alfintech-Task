<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'VAT',
        'VAT_percentage',
        'VAT_value',
        'paied_price',
        'store_id',
        'shipping_cost',
        
    ];
}
