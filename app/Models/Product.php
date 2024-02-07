<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Product extends Model
{
  // use HasF; hhgjnbmn actory;
  protected $fillable = ['name','description','price','image','balance'];

  public static function validate($request)
  {
    $request->validate([
      "name"=>"required|max:255",
      "description"=>"required",
      "price"=>"required|numeric|gt:0",
      "image"=>"image",
    ]);
  }

  public static function sumPricesByQuantities($products,$productsInSession)
  {
    $total = 0;
    foreach ($products as $product) 
    {
      $total = $total + ($product->price*$productsInSession[$product->id]);
    }

    return $total;
  }

  public function items()
  {
    return $this->hasMany(Item::class);
  }

}