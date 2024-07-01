<?php

namespace App\Models;

use App\Models\UnitGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RatePlan extends Model
{
    use HasFactory;

    protected $fillable = ['unit_group_id', 'price'];
    protected $with = ['unitGroup'];

    public function unitGroup(): BelongsTo
    {
        return $this->belongsTo(UnitGroup::class);
    }
}
