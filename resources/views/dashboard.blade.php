@extends('layouts.monster.app')

@section('head-title')
    Cora | Dashboard
@endsection

@section('breadcrumb-title')
    Dashboard
@endsection

@section('content')

    <h3>Total</h3>
    <div class="row">
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-inverse card-warning">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\NexmoExchange::all()->count() }}</h1>
                    <h6 class="text-white">Nexmo</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-info card-inverse">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\SkypeExchange::all()->count() }}</h1>
                    <h6 class="text-white">Skype</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-inverse card-success">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\CiscoSparkExchange::all()->count() }}</h1>
                    <h6 class="text-white">Cisco Spark</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-inverse card-primary">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\MicrosoftTeamsExchange::all()->count() }}</h1>
                    <h6 class="text-white">Microsoft Teams</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->

    <h3>Unique Users</h3>
    <div class="row">
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-inverse card-warning">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\NexmoExchange::select('msisdn')->distinct()->get()->count() }}</h1>
                    <h6 class="text-white">Nexmo</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-info card-inverse">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\SkypeExchange::select('from_id')->distinct()->get()->count() }}</h1>
                    <h6 class="text-white">Skype</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-inverse card-success">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\CiscoSparkExchange::select('person_email')->distinct()->get()->count() }}</h1>
                    <h6 class="text-white">Cisco Spark</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-4 col-lg-2 col-xlg-2">
            <div class="card card-inverse card-primary">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{ \App\MicrosoftTeamsExchange::select('from_id')->distinct()->get()->count() }}</h1>
                    <h6 class="text-white">Microsoft Teams</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    
@endsection

@section('plugins')
    
@endsection