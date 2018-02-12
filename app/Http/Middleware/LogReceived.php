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
use App\MicrosoftTeamsExchange;

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

                } else { // log everything else skype

                    Log::info(print_r($payload, true)); 
                    Log::info('Log Received BotFrameworkDriver: Unknown Skype Message Type');

                }

            } elseif($payload->get('channelId') == 'msteams') { // checks to see if from microsoft teams

                if($payload->get('type') == 'message') // ignore other message types
                {
                    $exchange = new MicrosoftTeamsExchange;

                    $exchange->text = $payload->get('text');
                    $exchange->text_format = $payload->get('textFormat');
                    $exchange->type = $payload->get('type');
                    $exchange->message_timestamp = Carbon::parse($payload->get('timestamp'))->toDateTimeString();
                    $exchange->msteams_id = $payload->get('id');
                    $exchange->channel_id = $payload->get('channelId');
                    $exchange->service_url = $payload->get('serviceUrl');
                    $exchange->from_id = $payload->get('from')['id'];
                    if(isset($payload->get('from')['name'])){ $exchange->from_name = $payload->get('from')['name']; } // checks to see if a name is set
                    if(isset($payload->get('from')['aadObjectId'])){ $exchange->aad_object_id = $payload->get('from')['aadObjectId']; } // checks to see if a name is set

                    $exchange->save();

                } else { // log everything else microsoft teams types

                    Log::info(print_r($payload, true));
                    Log::info('Log Received BotFrameworkDriver: Unknown Microsoft Teams Message Type');

                }

            } else { // log everything else microsoft teams

                Log::info(print_r($bot->getDriver(), true));
                Log::info('Log Received BotFrameworkDriver: Unknown Channel ID');

            }


        } else { // log everything else botframework drivers

            Log::info(print_r($bot->getDriver(), true));
            Log::info('Log Received BotFrameworkDriver: Unknown Driver');

        }

        // Log::debug(print_r($bot, true));  // exceeds memory size

        return $next($message);
    }
}
