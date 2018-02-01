<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NexmoSend extends Model
{
    /**
     * Get the exchange relevant to the send message
     */
    public function nexmoExchange()
    {
        return $this->belongsTo('App\NexmoExchange');
    }
}
