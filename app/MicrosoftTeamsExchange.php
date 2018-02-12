<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MicrosoftTeamsExchange extends Model
{
    public function microsoftTeamsSend()
    {
        return $this->hasOne('App\MicrosoftTeamsSend');
    }
}
