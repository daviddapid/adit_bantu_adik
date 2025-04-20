<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function transactionId(): Attribute
    {
        return Attribute::make(get: fn() => 'INV-' . Carbon::parse($this->created_at)->format('YmdHis'));
    }

    function formatedDate(): Attribute
    {
        return Attribute::make(get: fn() => Carbon::parse($this->created_at)->format('d/m/Y'));
    }

    function formatedTotal(): Attribute
    {
        return Attribute::make(get: fn() => number_format($this->total, 0, '.'));
    }

    function formatedTunai(): Attribute
    {
        return Attribute::make(get: fn() => number_format($this->tunai, 0, '.'));
    }
    function formatedKembalian(): Attribute
    {
        return Attribute::make(get: fn() => number_format($this->tunai - $this->total, 0, '.'));
    }

    function items()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
