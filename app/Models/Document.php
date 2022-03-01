<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(Borrower::class);
    }

    public function scopeNRICDoc($query)
    {
        return $query->whereDocumentType('NRIC');
    }

    public function scopeCBSRDoc($query)
    {
        return $query->whereDocumentType('CBS Report');
    }

    public function scopeBSDoc($query)
    {
        return $query->whereDocumentType('Bank Statement');
    }

    public function scopeACRADoc($query)
    {
        return $query->whereDocumentType('ACRA');
    }
}
