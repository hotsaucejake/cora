<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;
use App\Classes\Corus;

$dialogflow = ApiAi::create(env('DF_CORA_CLIENT'))->listenForAction();

$botman = resolve('botman');

// Apply global "received" middleware
$botman->middleware->received($dialogflow);

$botman->hears('smalltalk.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

$botman->hears('contact.phone', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information:
    $location = $extras['apiParameters']['location'];
    $phone = Corus::getPhone($location);

    $bot->reply($phone);
})->middleware($dialogflow);

$botman->hears('marketing.events', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

$botman->hears('input.unknown', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information:
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow);