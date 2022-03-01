<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
    use HasFactory;

    public $dates = ['last_followup', 'next_call', 'verified_at', 'loan_start_date', 'closed_at', 'consultant_assigned_date'];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function activeLoan(): HasOne
    {
        return $this->hasOne(Loan::class)->isActive();
    }

    public function counterOfferedLoan(): HasOne
    {
        return $this->hasOne(Loan::class)->isCounterOffered();
    }

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(Borrower::class);
    }

    public function consultant(): BelongsTo
    {
        return $this->belongsTo(Consultant::class);
    }

    public function followUps(): HasMany
    {
        return $this->hasMany(FollowUp::class);
    }

    public function applicationProgress(): HasMany
    {
        return $this->hasMany(ApplicationProgress::class);
    }
}
