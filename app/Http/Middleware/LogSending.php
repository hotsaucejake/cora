<?php

namespace App\Http\Middleware;

use Botman\Botman\Botman;
use BotMan\BotMan\Interfaces\Middleware\Sending;

// drivers to check for
use BotMan\Drivers\Nexmo\NexmoDriver;
use BotMan\Drivers\BotFramework\BotFrameworkDriver;

use App\NexmoExchange;
use App\NexmoSend;
use App\SkypeExchange;
use App\SkypeSend;

use Illuminate\Support\Facades\Log;

class LogSending implements Sending
{
    /**
     * Handle an outgoing message payload before/after it
     * hits the message service.
     *
     * @param mixed $payload
     * @param callable $next
     * @param BotMan $bot
     *
     * @return mixed
     */
    public function sending($payload, $next, BotMan $bot)
    {
        if($bot->getDriver() instanceof NexmoDriver) {

            foreach($bot->getMessages() as $message)
            {
                
                $oldPayload = $message->getPayload();
                $exchange = NexmoExchange::where('message_id', $oldPayload['messageId'])->latest()->first(); // find relevant exchange

                $send = new NexmoSend;
                $send->to = $payload['to'];
                $send->from = $payload['from'];
                $send->text = $payload['text'];

                $exchange->nexmoSend()->save($send); // save outgoing message with the original exchange it belongs to

            }

        } elseif($bot->getDriver() instanceof BotFrameworkDriver){

            foreach($bot->getMessages() as $message)
            {
                $oldPayload = $message->getPayload();

                if($oldPayload->get('channelId') == 'skype'){ // checks to see if from skype

                    if($oldPayload->get('type') == 'message') // checks to make sure not audio/video
                    {
                        $exchange = SkypeExchange::where('from_id', $oldPayload->get('from')['id'])->latest()->first(); // find relevant exchange

                        $send = new SkypeSend;
                        $send->type = $payload['type'];
                        $send->text = $payload['text'];

                        $exchange->skypeSend()->save($send); // save outgoing message with the original exchange it belongs to
                    } else {
                        Log::info(print_r($bot->getDriver(), true));
                        Log::info('LogSending Middleware Skype: Unknown type');
                    }

                } else {
                    Log::info(print_r($bot->getDriver(), true));
                    Log::info('LogSending Middleware BotFrameworkDriver: Unknown Channel ID');
                }
                
            }

        } else {

            Log::info(print_r($bot->getDriver(), true));
            Log::info(print_r($payload, true));
            Log::info('LogSending Middleware: Unknown Driver');

        }


        return $next($payload);
    }
}
