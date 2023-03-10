<?php

namespace App\Models;

use App\Enums\PlanInterval;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'interval',
        'interval_count',
        'stripe_product_id',
        'stripe_price_id',
        'recurring',
    ];

    protected $casts = [
        'recurring' => 'boolean',
        'interval'  => PlanInterval::class,
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
