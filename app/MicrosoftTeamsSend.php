<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MicrosoftTeamsSend extends Model
{
    /**
     * Get the exchange relevant to the send message
     */
    public function microsoftTeamsExchange()
    {
        return $this->belongsTo('App\MicrosoftTeamsExchange');
    }
}
