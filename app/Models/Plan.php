<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    # region Accessors / Mutators
    protected function price(): Attribute
    {
        return Attribute::set(
            fn (mixed $value) => (int)$value * 100
        );
    }
    # endregion
}
