<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coffee extends Model
{
    /** @use HasFactory<\Database\Factories\CoffeeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'origin',
        'roast_date',
        'stock',
    ];

    public function suppliers(): BelongsToMany {
        return $this->belongsToMany(Supplier::class, 'coffee_supplier');
    }
}
