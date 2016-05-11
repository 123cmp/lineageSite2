"use strict";

angular.module('lt2').controller('BoostController',
    ['$scope', 'ServerApi', '$state', '$localStorage', '$sce', function($scope, ServerApi, $state, $localStorage, $sce) {
        var params = $state.params.object;
        if(params)  $localStorage.accountsParams = params;
        else params = $localStorage.accountsParams;

        if(!params) $state.go('main');
        else {
            if(params.game) {
                ServerApi.getBoost(params.game).then(function(text) {
                    $scope.boostText = $sce.trustAsHtml(text);
                });
            }
        }


    }]);