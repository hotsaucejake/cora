<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;

$dialogflow = ApiAi::create(env('DF_CORA_CLIENT'))->listenForAction();

$botman = resolve('botman');

// Apply global "received" middleware
$botman->middleware->received($dialogflow);

// Apply matching middleware per hears command
$botman->hears('smalltalk.agent.acquaintance', function ($bot) { // The incoming message matched the action on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow);

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->fallback(function($bot) {
    // logic to save conversation
    // logic to notify
    $bot->reply('I didn\'t quite understand you... no worries :) I saved this convo and will ask on your behalf, I\'m new at this job and still learning!');
});