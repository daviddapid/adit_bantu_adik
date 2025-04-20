<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function priceInRupiah(): Attribute
    {
        return Attribute::make(get: fn() => number_format($this->price, 0, '.'));
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
