<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubIndustry extends Model
{
    use HasFactory;

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
}
