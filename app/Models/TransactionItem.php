<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function subtotal(): Attribute
    {
        return Attribute::make(get: fn() => number_format($this->price * $this->qty, 0, '.'));
    }

    function detail()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
