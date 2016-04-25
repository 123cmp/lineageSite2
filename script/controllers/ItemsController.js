"use strict";

angular.module('lt2').controller('ItemsController',
    ['$scope', 'ServerApi', '$state', '$localStorage', function($scope, ServerApi, $state, $localStorage) {
        var params = $state.params.object;
        if(params)  $localStorage.itemsParams = params;
        else params = $localStorage.itemsParams;

        if(!params) $state.go('main');

        if(params.game) {
            ServerApi.getItems(params.game).then(function (items) {
                $scope.items = items;
            })
        }
    }]);