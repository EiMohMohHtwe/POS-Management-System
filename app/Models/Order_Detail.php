<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
    	'product_id',
    	'quantity',
    	'unitprice',
    	'amount',
    	'discount',
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
