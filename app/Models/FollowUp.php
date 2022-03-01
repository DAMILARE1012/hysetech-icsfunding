<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FollowUp extends Model
{
    use HasFactory;

    public $dates = ['next_followup'];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function addedBy(): MorphTo
    {
        return $this->morphTo();
    }
}
