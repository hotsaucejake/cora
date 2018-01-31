<?php

namespace App\Http\Middleware;

use Botman\Botman\Botman;
use BotMan\BotMan\Interfaces\Middleware\Received;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;

// drivers to check for
use BotMan\Drivers\Nexmo\NexmoDriver;
use BotMan\Drivers\BotFramework\BotFrameworkDriver;

// save exchanges
use App\NexmoExchange;

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
        if($bot->getDriver() instanceof NexmoDriver) {

            $payload = $message->getPayload(); // get the message payload (array)
            $exchange = new NexmoExchange; // store exchange info
            
            $exchange->msisdn = $payload['msisdn'];
            $exchange->to = $payload['to'];
            $exchange->message_id = $payload['messageId'];
            $exchange->text = $payload['text'];
            $exchange->type = $payload['type'];
            $exchange->keyword = $payload['keyword'];
            $exchange->message_timestamp = $payload['message-timestamp'];

            $exchange->save();

        } elseif($bot->getDriver() instanceof BotFrameworkDriver){

            Log::info('BotFrameworkDriver');

        } else {

            Log::info(print_r($bot->getDriver(), true));
            
        }

        // Log::debug(print_r($bot, true));  // exceeds memory size

        return $next($message);
    }
}
