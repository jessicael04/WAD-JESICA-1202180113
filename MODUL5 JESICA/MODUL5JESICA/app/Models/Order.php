<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function alldata()
    {
        return DB::table('orders')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->get();
    }
}