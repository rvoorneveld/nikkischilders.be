<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }

}
