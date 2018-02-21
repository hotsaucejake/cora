<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NexmoExchange;
use App\CiscoSparkExchange;
use App\MicrosoftTeamsExchange;
use App\SkypeExchange;

class DashboardController extends Controller
{
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
    public function index()
    {
        return view('dashboard');
    }
}
