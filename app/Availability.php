<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model
{

    use SoftDeletes;

    public const DURATION_MINUTES = 60;

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
