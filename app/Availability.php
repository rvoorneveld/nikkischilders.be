<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Availability extends Model
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
        return "/availabilities/{$this->id}";
    }

    public function getDateTimeStart(): \DateTime
    {
        return $this->getAttribute('dateTimeStart');
    }

    public function getDateTimeEnd(): \DateTime
    {
        return $this->getAttribute('dateTimeEnd');
    }

    public function appointment(): HasOne
    {
        return $this->HasOne(Appointment::class);
    }

}
