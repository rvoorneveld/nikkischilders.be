<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{

    protected $dates = [
        'dateTimeStart',
        'dateTimeEnd',
    ];

    protected $guarded = [];

    public function availability(): BelongsTo
    {
        return $this->BelongsTo(Availability::class);
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
