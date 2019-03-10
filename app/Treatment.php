<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{

    protected $guarded = [];

    public $title;
    public $description;
    public $price;

    public function getPath(): string
    {
        return "/treatments/{$this->id}";
    }

    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    public function getPrice(): float
    {
        return $this->getAttribute('price');
    }

}
