<?php

namespace App;

use App\Services\Foundation\Security;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function encodedId(): int
    {
        return (new Security)->encode($this->id);
    }

}
