@extends('layouts.monster.app')

@section('head-title')
    Cora | Documentation
@endsection

@section('breadcrumb-title')
    Documentation > Hearing Messages
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="text-center">Hearing Messages</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Basic Commands</h2>
                    <p class="card-text">The easiest way to listen for Cora commands is by "listening" for a specific keyword and a Closure, providing a very simple and expressive method of defining bot commands.</p>
                    <pre><code>
    $cora->hears('foo', function ($bot) {
        $bot->reply('Hello World');
    });
    // Process incoming message
    $cora->listen();
                    </code></pre>
                    <p class="card-text">In addition to the Closure you can also pass a class and method that will get called if the keyword matches.</p>
                    <pre><code>
    $cora->hears('foo', 'Some\Namespace\MyBotCommands@handleFoo');
    // Process incoming message
    $cora->listen();

    class MyBotCommands {

        public function handleFoo($bot) {
            $bot->reply('Hello World');
        }

    }
                    </code></pre>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Command Parameters</h2>
                    <p class="card-text">Listening to basic keywords is fine, but sometimes you will need to capture parts of the information your Cora users are providing. For example, you may need to listen for a command that captures a user's name. You may do so by defining command parameters:</p>
                    <pre><code>
    $cora->hears('call me {name}', function ($bot, $name) {
        $bot->reply('Your name is: '.$name);
    });
                    </code></pre>
                    <p class="card-text">You may define as many command parameters as required by your command:</p>
                    <pre><code>
    $cora->hears('call me {name} the {adjective}', function ($bot, $name, $adjective) {
        //
    });
                    </code></pre>
                    <p class="card-text">Command parameters are always encased within <code>{}</code> braces and should consist of alphabetic characters only.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Matching Regular Expressions</h2>
                    <p class="card-text">If command parameters do not give you enough power and flexibility for Cora commands, you can also use more complex regular expressions in Cora commands. For example, you may want Cora to only listen for digits. You may do so by defining a regular expression in your command like this:</p>
                    <pre><code>
    $cora->hears('I want ([0-9]+)', function ($bot, $number) {
        $bot->reply('You will get: '.$number);
    });
                    </code></pre>
                    <p class="card-text">Just like the command parameters, each regular expression match group will be passed to the handling Closure.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Command Groups</h2>
                    <p class="card-text">Command groups allow you to share command attributes, such as middleware or channels, across a large number of commands without needing to define those attributes on each individual command. Shared attributes are specified in an array format as the first parameter to the <code>$cora->group</code> method.</p>
                    <h3 class="card-title">Drivers</h3>
                    <p class="card-text">A common use-case for command groups is restricting the commands to a specific messaging service using the <code>driver</code> parameter in the group array:</p>
                    <pre><code>
    $cora->group(['driver' => SlackDriver::class], function($bot) {
        $bot->hears('keyword', function($bot) {
            // Only listens on Slack
        });
    });
                    </code></pre>
                    <h3 class="card-title">Middleware</h3>  
                    <p class="card-text">You may also group your commands, to send them through custom middleware classes. These classes can either listen for different parts of the message or extend your message by sending it to a third party service. The most common use-case would be the use of a Natural Language Processor like wit.ai or api.ai.</p>
                    <pre><code>
    $cora->group(['middleware' => new MyCustomMiddleware()], function($bot) {
        $bot->hears('keyword', function($bot) {
            // Will be sent through the custom middleware object.
        });
    });
                    </code></pre>
                    <h3 class="card-title">Recipients</h3> 
                    <p class="card-text">Command groups may also be used to restrict the commands to specific recipients, meaning they get restricted to the user sending the message to Cora.</p>
                    <pre><code>
    $cora->group(['recipient' => '1234567890'], function($bot) {
        $bot->hears('keyword', function($bot) {
            // Only listens when recipient '1234567890' is sending the message.
        });
    });
                    </code></pre>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Fallbacks</h2>
                    <p class="card-text">Cora allows you to create a fallback method, that gets called if none of your "hears" patterns matches. You may use this feature to give Cora users guidance on how to use her.</p>
                    <pre><code>
    $cora->fallback(function($bot) {
        $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
    });
                    </code></pre>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('plugins')
    
@endsection