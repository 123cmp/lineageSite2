"use strict";

angular.module('lt2').controller('IndexController',
    ['$scope', '$rootScope', function($scope, $rootScope) {
        $scope.currentState = 'main';
        $scope.mobileOpened = true;

        $scope.toggleMobileMenu = function() {
            $scope.mobileOpened = !$scope.mobileOpened;
        };

        $rootScope.$on('$stateChangeStart',
            function(event, toState){
                if(toState && toState.name)
                    $scope.currentState = toState.name;
            })
    }]);