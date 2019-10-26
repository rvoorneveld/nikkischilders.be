<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Optimus\Optimus;

class Category extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function path(): string
    {
        return '/categorie/'.$this->slug;
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }

}
