<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;
use App\Classes\Corus;

$dialogflow = ApiAi::create(env('DF_CORA_CLIENT'))->listenForAction();

$botman = resolve('botman');

// Apply global "received" middleware
$botman->middleware->received($dialogflow);

//////////////////////////////////////////
//////////////////////////////////////////
////// Small Talk
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('smalltalk.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

//////////////////////////////////////////
//////////////////////////////////////////
////// Contact
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('contact.phone', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information:
    $location = $extras['apiParameters']['location'];
    $phone = Corus::getPhone($location);

    $bot->reply($phone);
})->middleware($dialogflow);

//////////////////////////////////////////
//////////////////////////////////////////
////// Company
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('company.about', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

$botman->hears('company.founded', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

//////////////////////////////////////////
//////////////////////////////////////////
////// Marketing
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('marketing.events', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

$botman->hears('marketing.social_media', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information:
    $social = $extras['apiParameters']['social_media'];
    $social_account = Corus::getSocial($social);

    $bot->reply($social_account);
})->middleware($dialogflow);

//////////////////////////////////////////
//////////////////////////////////////////
////// Default Fallback
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('input.unknown', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information:
    $apiReply = $extras['apiReply'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow);