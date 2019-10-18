<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function path(): string
    {
        return "/treatments/{$this->id}";
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
