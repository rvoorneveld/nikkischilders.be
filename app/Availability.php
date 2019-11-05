<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Availability extends Model
{

    use SoftDeletes;

    public const HALF_AN_HOUR_IN_MINUTES = 30;
    public const ONE_DAY_IN_SECONDS = 3600 * 24;

    protected $dates = [
        'start',
        'end',
    ];

    protected $guarded = [];

    public function appointment(): BelongsToMany
    {
        return $this->BelongsToMany(Appointment::class);
    }

}
