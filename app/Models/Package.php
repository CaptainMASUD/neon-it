<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'features',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function requests()
    {
        return $this->hasMany(PackageRequest::class);
    }

    public function getFeaturesArrayAttribute(): array
    {
        if (!$this->features) {
            return [];
        }

        return array_filter(array_map('trim', explode("\n", $this->features)));
    }
}