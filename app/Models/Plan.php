<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $price
 * @property string $name
 * @property string $url
 * @property integer|string $stripe_id
 * @property boolean $recomended
 * @property string $description
 */
class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'url',
      'stripe_id',
      'price',
      'recomended',
      'description'
    ];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function getPriceBrAttribute(): string
    {
        return number_format($this->price, 2, ',', '.');
    }
}
