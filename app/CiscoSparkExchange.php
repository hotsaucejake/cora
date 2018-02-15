<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiscoSparkExchange extends Model
{
    public function ciscoSparkSend()
    {
        return $this->hasOne('App\CiscoSparkSend');
    }
}
