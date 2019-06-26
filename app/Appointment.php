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

    public function getPath(): string
    {
        return "/appointments/{$this->id}";
    }

    public function getDateTimeStart(): string
    {
        return $this->getAttribute('dateTimeStart')->format('d-m-Y H:i');
    }

    public function availability(): BelongsTo
    {
        return $this->BelongsTo(Availability::class);
    }

    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    public function treatment(): BelongsTo
    {
        return $this->BelongsTo(Treatment::class);
    }

}
