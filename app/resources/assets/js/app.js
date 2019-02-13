require('./bootstrap');
import 'angular';

var app = angular.module('app', []);


app.controller('PlayerController', ['$scope', '$http', function ($scope, $http) {
    $scope.players = [];
   
    // List players
    $scope.loadPlayers = function () {
        $http.get('api/v1/players')
            .then(function success(e) {
                $scope.players = e.data.players;
            });
    };
    $scope.loadPlayers();

    $scope.errors = [];
 
    $scope.player = {
        id: '',
        name: '',
        level: '',
        score: '',
        suspected: '',
    };
    $scope.initPlayer = function () {
        $scope.resetForm();
        $("#add_new_player").modal('show');
    };
 
    // Add new Player
    $scope.addPlayer = function () {
        $http.post('/api/v1/players', {
            name: $scope.player.name,
            level: $scope.player.level,
            score: $scope.player.score
        }).then(function success(e) {
            $scope.resetForm();
            $scope.players.push(e.data.player);
            $("#add_new_player").modal('hide');
 
        }, function error(error) {
            $scope.recordErrors(error);
        });
    };
 
    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if (error.data.errors.name) {
            $scope.errors.push(error.data.errors.name[0]);
        }
        if (error.data.errors.level) {
            $scope.errors.push(error.data.errors.level[0]);
        }
        if (error.data.errors.score) {
            $scope.errors.push(error.data.errors.score[0]);
        }
    };
 
    $scope.resetForm = function () {
        $scope.player.name = '';
        $scope.player.level = '';
        $scope.player.score = '';
        
        $scope.errors = [];
    };

    $scope.filterLevel = function (filter) {
        $http.get('api/v1/players?level='+filter)
            .then(function success(e) {
                $scope.players = e.data.players;
            });
    };

   

    $scope.searchFilter = function () {
        
        $http.get('api/v1/players?search='+ $scope.searchText)
            .then(function success(e) {
                $scope.players = e.data.players;
            });
    };
}]);