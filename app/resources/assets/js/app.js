require('./bootstrap');
import 'angular';

var app = angular.module('app', []);


app.controller('PlayerController', ['$scope', '$http', function ($scope, $http) {
    $scope.players = [];
    console.log("success");
    // List players
    $scope.loadPlayers = function () {
        $http.get('api/v1/players')
            .then(function success(e) {
                console.log("success");
                $scope.players = e.data.players;
            });
    };
    $scope.loadPlayers();

    $scope.errors = [];
 
    $scope.player = {
        id: '',
        name: '',
        level: '',
        score: ''
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
 
        if (error.data.errors.description) {
            $scope.errors.push(error.data.errors.description[0]);
        }
    };
 
    $scope.resetForm = function () {
        $scope.player.name = '';
        $scope.player.level = '';
        $scope.player.score = '';
        
        $scope.errors = [];
    };
}]);