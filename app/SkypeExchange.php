<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkypeExchange extends Model
{
    public function skypeSend()
    {
        return $this->hasOne('App\SkypeSend');
    }
}