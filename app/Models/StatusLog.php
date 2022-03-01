<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class StatusLog extends Model
{
    use HasFactory;

    public function module(): MorphTo
    {
        return $this->morphTo();
    }
}
