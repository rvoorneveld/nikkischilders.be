<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $guarded = [];

    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $emailAddress;

    public function getPath(): string
    {
        return "/customers/{$this->id}";
    }

    public function getFirstName(): string
    {
        return $this->getAttribute('firstName');
    }

    public function getLastName(): string
    {
        return $this->getAttribute('lastName');
    }

    public function getName(): string
    {
        return "{$this->getAttribute('lastName')}, {$this->getAttribute('firstName')}";
    }

    public function getPhoneNumber(): string
    {
        return $this->getAttribute('phoneNumber');
    }

    public function getEmailAddress(): string
    {
        return $this->getAttribute('emailAddress');
    }

}
