"use strict";

angular.module('lt2').controller('BoostController',
    ['$scope', 'ServerApi', '$state', '$localStorage', function($scope, ServerApi, $state, $localStorage) {
        var params = $state.params.object;
        if(params)  $localStorage.accountsParams = params;
        else params = $localStorage.accountsParams;

        if(!params) $state.go('main');
        else {
            if(params.game) {
                ServerApi.getBoost(params.game).then(function(text) {
                    console.log(text);
                    $scope.boostText = text;
                });
            }
        }


    }]);