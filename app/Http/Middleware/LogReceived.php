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
use App\SkypeExchange;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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

            $payload = $message->getPayload(); // get the message payload (array)

            if($payload->get('channelId') == 'skype'){ // checks to see if from skype

                if($payload->get('type') == 'message') // ignore conversationUpdate
                {
                    $exchange = new SkypeExchange;

                    $exchange->text = $payload->get('text');
                    $exchange->type = $payload->get('type');
                    $exchange->message_timestamp = Carbon::parse($payload->get('timestamp'))->toDateTimeString();
                    $exchange->skype_id = $payload->get('id');
                    $exchange->channel_id = $payload->get('channelId');
                    $exchange->service_url = $payload->get('serviceUrl');
                    $exchange->from_id = $payload->get('from')['id'];
                    if(isset($payload->get('from')['name'])){ $exchange->from_name = $payload->get('from')['name']; } // checks to see if a name is set
                    
                    $exchange->save();

                } elseif($payload->get('type') == 'conversationUpdate') {
                    // do nothing
                } else {
                    Log::info(print_r($payload, true)); // log everything else
                    Log::info('BotFrameworkDriver: Unknown Message Type');
                }

            } else {
                Log::info(print_r($bot->getDriver(), true));
                Log::info('BotFrameworkDriver: Unknown Channel ID');
            }


        } else {

            Log::info(print_r($bot->getDriver(), true));
            Log::info('Unknown Driver');

        }

        // Log::debug(print_r($bot, true));  // exceeds memory size

        return $next($message);
    }
}
