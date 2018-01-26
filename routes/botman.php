<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Middleware\ApiAi;
use App\Http\Middleware\LogReceived;
use App\Classes\Corus;

$dialogflow = ApiAi::create(env('DF_CORA_CLIENT'))->listenForAction();
$logReceived = new LogReceived();

$botman = resolve('botman');

// Apply global "received" middleware
$botman->middleware->received($logReceived);
$botman->middleware->received($dialogflow);


//////////////////////////////////////////
//////////////////////////////////////////
////// Small Talk
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('smalltalk.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];

    if($apiAction == 'smalltalk.jokes'){
        $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
        $apiReply = $joke->value->joke;
    }
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

//////////////////////////////////////////
//////////////////////////////////////////
////// Contact
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('contact.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information:
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];

    if($apiAction == 'contact.phone'){
        $location = $extras['apiParameters']['location'];
        $apiReply = Corus::getPhone($location);
    }

    $bot->reply($apiReply);
})->middleware($dialogflow);

//////////////////////////////////////////
//////////////////////////////////////////
////// Company
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('company.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
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
////// PaaS
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('paas.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

//////////////////////////////////////////
//////////////////////////////////////////
////// Services
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('services.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

//////////////////////////////////////////
//////////////////////////////////////////
////// Orders
//////////////////////////////////////////
//////////////////////////////////////////

$botman->hears('orders.*', function ($bot) { // The incoming message matched the action on Dialogflow
    $extras = $bot->getMessage()->getExtras(); // Retrieve Dialogflow information
    $apiReply = $extras['apiReply'];
    $apiAction = $extras['apiAction'];
    $apiIntent = $extras['apiIntent'];
    
    $bot->reply($apiReply);
})->middleware($dialogflow); // Apply matching middleware per hears command

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