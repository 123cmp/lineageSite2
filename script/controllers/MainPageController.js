"use strict";

angular.module('lt2').controller('MainPageController',
    ['$scope', 'ServerApi', '$state', function($scope, ServerApi, $state) {

    ServerApi.getGames().then(function(games) {
        $scope.games = games;

        angular.forEach($scope.games, function(v) {
            if(!v.img) v.img = 'http://vignette3.wikia.nocookie.net/galaxylife/images/7/7c/Noimage.png/revision/latest?cb=20120622041841';
        });
    });

    $scope.goTo = function(type, params) {
        switch (type) {
            case 'items': {
                $state.go('items', {object: params});
            } break;
            case 'characters': {
                $state.go('accounts', {object: params});
            } break;
            case 'boost': {
                $state.go('static.boost');
            } break;
            case 'gold': {
                $state.go('calculator', {object: params});
            } break;
        }

    }
}]);