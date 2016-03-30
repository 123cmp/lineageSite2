"use strict";

angular.module('lt2').controller('IndexController',
    ['$scope', '$rootScope', function($scope, $rootScope) {
        $scope.currentState = 'main';
        $rootScope.$on('$stateChangeStart',
            function(event, toState){
                $scope.currentState = toState.name;
            })
    }]);