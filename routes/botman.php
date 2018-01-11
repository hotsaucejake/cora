<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;
use App\Classes\Corus;

$dialogflow = ApiAi::create(env('DF_CORA_CLIENT'))->listenForAction();

$botman = resolve('botman');

// Apply global "received" middleware
$botman->middleware->received($dialogflow);

// Apply matching middleware per hears command
$botman->hears('smalltalk.*', function ($bot) { // The incoming message matched the action on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow);

$botman->hears('contact.phone', function ($bot) { // The incoming message matched the action on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    $location = $extras['apiParameters']['location'];
    $phone = Corus::getPhone($location);

    $bot->reply($phone);
})->middleware($dialogflow);

$botman->hears('input.unknown', function ($bot) { // The incoming message matched the action on Dialogflow
    // Retrieve Dialogflow information:
    $extras = $bot->getMessage()->getExtras();
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow);