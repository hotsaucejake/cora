<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NexmoExchange extends Model
{
    public function nexmoSend()
    {
        return $this->hasOne('App\NexmoSend');
    }
}
