<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    use HasFactory;

    public function loanType(): BelongsTo
    {
        return $this->belongsTo(LoanType::class);
    }

    public function scopeIsActive($query)
    {
        return $query->whereActive(true);
    }

    public function scopeIsCounterOffered($query)
    {
        return $query->whereCounterOffer(true);
    }
}
