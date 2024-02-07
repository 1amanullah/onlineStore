<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Order extends Model
{
    // use HasFactory;
    protected $fillable =  ['total','user_id'];


    public static function validate($request)
    {
        $request->validate([
            "total" =>  "required|numeric",
            "user_id" => "required|exists:user,id",
        ]);       
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
}
