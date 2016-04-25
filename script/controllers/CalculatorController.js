"use strict";

angular.module('lt2').controller('CalculatorController',
    ['$scope', 'ServerApi', '$state', function($scope, ServerApi, $state) {
        $scope.isServerChoose = false;

        $scope.model = {
            server: "",
            comment:"",
            nickname: "",
            contact: "",
            realM: "",
            gameM: ""
        };

        $scope.info = {
            maxCommentLength: 15,
            servers: [
                {
                    name: "server1"
                },
                {
                    name: "server2"
                }
            ]
        };

        $scope.$watch('model.server', function() {
            if($scope.model.server) {
                $scope.isServerChoose = true;
            }
        });

        $scope.send = function() {

        }
    }]);