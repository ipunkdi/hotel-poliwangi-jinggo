<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\RatePlan;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitGroup extends Model
{
    use HasFactory;
    protected $fillable = ['type'];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    public function ratePlan(): BelongsTo
    {
        return $this->belongsTo(RatePlan::class);
    }
}
