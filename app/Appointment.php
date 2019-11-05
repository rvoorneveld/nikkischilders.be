<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{

    protected $dates = [
        'start',
        'end',
    ];

    protected $guarded = [];

    public function availability(): BelongsToMany
    {
        return $this->BelongsToMany(Availability::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function treatment(): BelongsTo
    {
        return $this->BelongsTo(Treatment::class);
    }

}
