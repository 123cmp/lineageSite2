"use strict";

angular.module('lt2').controller('MainPageController',
    ['$scope', 'ServerApi', '$state', function($scope, ServerApi, $state) {

    ServerApi.getGames().then(function(games) {
        $scope.games = games;

        angular.forEach($scope.games, function(v) {
            console.log(v.img);
            if(!v.img) v.img = 'http://epaper2.mid-day.com/images/no_image_thumb.gif';
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