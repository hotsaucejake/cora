<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkypeSend extends Model
{
    /**
     * Get the exchange relevant to the send message
     */
    public function skypeExchange()
    {
        return $this->belongsTo('App\SkypeExchange');
    }
}
