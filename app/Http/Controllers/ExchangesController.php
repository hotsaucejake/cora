<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangesController extends Controller
{
    static private $default1 = "I didn't understand that - I'm saving this so I can learn how to better respond to this in the future.";
    static private $default2 = "I didn't quite understand you... no worries :) I saved this convo and will ask on your behalf, I'm new at this job and still learning!";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function nexmo()
    {
        $title = 'Nexmo';
        $link =  'nexmo';
        $exchanges = \App\NexmoExchange::all();
        $defaults = \App\NexmoSend::where('text', self::$default1)->orWhere('text', self::$default2)->get();
        $unknowns = collect();

        foreach($defaults as $default)
        {
            $unknowns = $unknowns->push($default->nexmoExchange);
        }

        $unknowns = $unknowns->sortByDesc('message_timestamp')->values();


        return view('exchanges', compact('exchanges', 'title', 'link', 'unknowns'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function skype()
    {
        $title = 'Skype';
        $link =  'skype';
        $exchanges = \App\SkypeExchange::all();
        $defaults = \App\SkypeSend::where('text', self::$default1)->orWhere('text', self::$default2)->get();
        $unknowns = collect();

        foreach($defaults as $default)
        {
            $unknowns = $unknowns->push($default->skypeExchange);
        }

        $unknowns = $unknowns->sortByDesc('message_timestamp')->values();
        

        return view('exchanges', compact('exchanges', 'title', 'link', 'unknowns'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function spark()
    {
        $title = 'Cisco Spark';
        $link =  'spark';
        $exchanges = \App\CiscoSparkExchange::all();
        $defaults = \App\CiscoSparkSend::where('text', self::$default1)->orWhere('text', self::$default2)->get();
        $unknowns = collect();

        foreach($defaults as $default)
        {
            $unknowns = $unknowns->push($default->ciscoSparkExchange);
        }

        $unknowns = $unknowns->sortByDesc('message_timestamp')->values();
        

        return view('exchanges', compact('exchanges', 'title', 'link', 'unknowns'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function teams()
    {
        $title = 'Microsoft Teams';
        $link =  'teams';
        $exchanges = \App\MicrosoftTeamsExchange::all();
        $defaults = \App\MicrosoftTeamsSend::where('text', self::$default1)->orWhere('text', self::$default2)->get();
        $unknowns = collect();

        foreach($defaults as $default)
        {
            $unknowns = $unknowns->push($default->microsoftTeamsExchange);
        }

        $unknowns = $unknowns->sortByDesc('message_timestamp')->values();
        

        return view('exchanges', compact('exchanges', 'title', 'link', 'unknowns'));
    }
}
