<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{

    public const DURATION_MINUTES = 90;

    protected $dates = [
        'dateTime',
    ];
    protected $guarded = [];

    public $dateTime;

    public function getPath(): string
    {
        return "/availabilities/{$this->id}";
    }

    public function getDateTime(): \DateTime
    {
        return $this->getAttribute('dateTime');
    }

}
