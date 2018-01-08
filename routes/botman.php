<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->fallback(function($bot) {
    $bot->reply('I didn\'t quite understand you... no worries :) I saved this convo and will ask on your behalf, I\'m new at this job and still learning!');
});