"use strict";

angular.module('lt2').controller('AccountsController',
    ['$scope', 'ServerApi', '$state', '$localStorage', function($scope, ServerApi, $state, $localStorage) {
        var params = $state.params.object;
        if(params)  $localStorage.accountsParams = params;
        else params = $localStorage.accountsParams;
        $scope.textFile = "";
        if(!params) $state.go('main');
        else {
            if(params.game) {
                ServerApi.getAccounts(params.game).then(function(accounts) {
                    console.log(accounts);
                    $scope.accounts = accounts;
                });

                ServerApi.getText(params.game, 'accounts').then(function(result) {
                    $scope.textFile = 'partials/texts/' + result[0].file;
                });
            }


        }




    }]);