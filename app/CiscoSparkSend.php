<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiscoSparkSend extends Model
{
    public function ciscoSparkExchange()
    {
        return $this->belongsTo('App\CiscoSparkExchange');
    }
}
