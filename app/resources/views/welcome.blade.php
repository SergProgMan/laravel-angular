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
                            <p class="text-primary">Tournament​ ​ 101​ ​ - ​ ​ Final​ ​ Results</p>
                        </div>
     
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form">
                                <input class="form-control" 
                                        type="text" 
                                        placeholder="Search" 
                                        aria-label="Search" 
                                        ng-model="searchText"
                                        ng-change="searchFilter()">
                            </div>
                              
                            <table class="table table-bordered table-striped" ng-if="players.length > 0">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Level
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" ng-click="filterLevel('rookie')">rookie</a></li>
                                                <li><a href="#" ng-click="filterLevel('amateur')">amateur</a></li>
                                                <li><a href="#" ng-click="filterLevel('pro')">pro</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th>Score</th>
                                </tr>
                                <tr ng-repeat="(index, player) in players" ng-class="{'danger': player.Suspected}">
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
            <div class="modal fade" tabindex="-1" role="dialog" id="add_new_player">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Player</h4>
                            </div>
                            <div class="modal-body">
         
                                <div class="alert alert-danger" ng-if="errors.length > 0">
                                    <ul>
                                        <li ng-repeat="error in errors">@{{ error }}</li>
                                    </ul>
                                </div>
         
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" ng-model="player.name">
                                </div>

                                <div class="form-group">
                                    <label for="level">Level</label>  
                                    <div class="form-group" id="level">                                                                    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                    type="radio" 
                                                    name="inlineRadioOptions" 
                                                    id="inlineRadio1" 
                                                    value="rookie"
                                                    ng-model="player.level">
                                            <label class="form-check-label" for="inlineRadio1">rookie</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                    type="radio" 
                                                    name="inlineRadioOptions" 
                                                    id="inlineRadio2" 
                                                    value="amateur" 
                                                    ng-model="player.level">
                                            <label class="form-check-label" for="inlineRadio2">amateur</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                    type="radio" 
                                                    name="inlineRadioOptions" 
                                                    id="inlineRadio3" 
                                                    value="pro" 
                                                    ng-model="player.level">
                                            <label class="form-check-label" for="inlineRadio3">pro</label>
                                        </div> 
                                        <div class="form-group">
                                            <label for="score">Score</label>                                 
                                            <input type="number" min="0" step="1" max="150" name="score" class="form-control " ng-model="player.score">
                                        </div>   
                                    </div>
                                </div>                                                     
     
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" ng-click="addPlayer()">Submit</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->     
        </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
