"use strict";

angular.module('lt2').controller('FAQController',
    ['$scope', function($scope) {
        $scope.active = -1;

        $scope.activate = function(index) {
            if($scope.active == index)
                $scope.active = -1;
            else
                $scope.active = index
        }
    }]);