<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ApplicationStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function statusLogs(): MorphMany
    {
        return $this->morphMany(StatusLog::class, 'module');
    }


}
