"use strict";

angular.module('lt2').controller('MainPageController',
    ['$scope', 'ServerApi', '$state', function($scope, ServerApi, $state) {

    ServerApi.getGames().then(function(games) {
        $scope.games = games;
    });

    $scope.goTo = function(type, params) {
        switch (type) {
            case 'items': {
                $state.go('items', {object: params});
            } break;
            case 'accounts': {
                $state.go('accounts', {object: params});
            } break;
            case 'boost': {
                $state.go('static.boost');
            } break;
            case 'calculator': {
                $state.go('calculator', {object: params});
            } break;
        }

    }
}]);