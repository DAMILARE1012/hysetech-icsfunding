<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Borrower extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $dates = ['appointment_date', 'resignation_date', 'dob'];
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function NRIC(): HasOne
    {
        return $this->hasOne(Document::class)->NRICDoc();
    }

    public function CBSR(): HasOne
    {
        return $this->hasOne(Document::class)->CBSRDoc();
    }

    public function BS(): HasOne
    {
        return $this->hasOne(Document::class)->BSDoc();
    }

    public function ACRA(): HasOne
    {
        return $this->hasOne(Document::class)->ACRADoc();
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notified');
    }

}
