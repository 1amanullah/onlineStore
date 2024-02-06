<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class Item extends Model
{
    use HasFactory;

    public static function validate(Request $request)
    {
        $request->validate([
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "product_id" => "required|exists:products,id",
            "order_id" => "required|exists:orders,id",
        ]);
    }


}
