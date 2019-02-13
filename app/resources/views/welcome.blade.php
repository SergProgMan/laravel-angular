<!doctype html>
<html lang="{{ app()->getLocale() }}"  ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">        

        <title>Tournament</title>
    </head>
    <body>  
    
        <div class="container" ng-controller="PlayerController">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button class="btn btn-primary btn-xs pull-right" ng-click="initPlayer()">Add Player</button>
                            Player
                        </div>
     
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
     
     
                            <table class="table table-bordered table-striped" ng-if="players.length > 0">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Score</th>
                                </tr>
                                <tr ng-repeat="(index, player) in players">
                                    <td>@{{ player.id }}</td>
                                    <td>@{{ player.name }}</td>
                                    <td>@{{ player.level }}</td>
                                    <td>@{{ player.score }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
   
    </body>
</html>
