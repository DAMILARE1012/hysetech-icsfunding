<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Business extends Model
{
    use HasFactory;

    public function borrowers(): HasMany
    {
        return $this->hasMany(Borrower::class);
    }

    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }

    public function subIndustry(): BelongsTo
    {
        return $this->belongsTo(SubIndustry::class);
    }

    public function bankAccount(): MorphOne
    {
        return $this->morphOne(BankAccount::class, 'owner');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function nricDocs(): HasMany
    {
        return $this->hasMany(Document::class)->NRICDoc();
    }

    public function cbsrDocs(): HasMany
    {
        return $this->hasMany(Document::class)->CBSRDoc();
    }

    public function bankStatements(): HasMany
    {
        return $this->hasMany(Document::class)->BSDoc();
    }

    public function acraDocs(): HasMany
    {
        return $this->hasMany(Document::class)->ACRADoc();
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notified');
    }

}
