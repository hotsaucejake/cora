<?php

namespace App\Http\Middleware;

use Botman\Botman\Botman;
use BotMan\BotMan\Interfaces\Middleware\Received;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;

use Illuminate\Support\Facades\Log;

class LogReceived implements Received
{
    /**
     * Handle an incoming message.
     *
     * @param IncomingMessage $message
     * @param callable $next
     * @param BotMan $bot
     *
     * @return mixed
     */
    public function received(IncomingMessage $message, $next, BotMan $bot)
    {
        Log::debug(print_r($message, true));

        return $next($message);
    }
}
