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

    public $dateTimeStart;
    public $dateTimeEnd;

    public function getPath(): string
    {
        return "/appointments/{$this->id}";
    }

    public function getDateTimeStart(): \DateTime
    {
        return $this->getAttribute('dateTimeStart');
    }

    public function getDateTimeEnd(): \DateTime
    {
        return $this->getAttribute('dateTimeEnd');
    }

    public function treatment(): BelongsTo
    {
        return $this->BelongsTo(Treatment::class);
    }

    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

}
