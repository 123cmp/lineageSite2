"use strict";

angular.module('lt2').controller('CalculatorController',
    ['$scope', 'ServerApi', '$state', '$localStorage', function($scope, ServerApi, $state, $localStorage) {
        $scope.isServerChoose = false;
        $scope.currentServer = null;

        var params = $state.params.object;
        if(params)  $localStorage.itemsParams = params;
        else params = $localStorage.itemsParams;

        $scope.model = {
            server: "",
            comment:"",
            nickname: "",
            contact: "",
            realM: "",
            gameM: ""
        };

        $scope.info = {
            maxCommentLength: 150,
            servers: []
        };

        var promise = ServerApi.getGameServers(params.game, params.currency);
        promise.then(function(data) {
            $scope.info.servers = data.servers;
            console.log($scope.info.servers[1]);
        });

        $scope.$watch('model.server', function() {
            if($scope.model.server) {
                $scope.isServerChoose = true;
                $scope.currentServer = findServer($scope.model.server);

                console.log($scope.currentServer);
                $scope.onChangeRealMoney();
            }
        });

        $scope.onChangeRealMoney = function() {
            inputControl();

            if($scope.model.realM && $scope.currentServer)
                $scope.model.gameM = Math.floor(($scope.model.realM / $scope.currentServer.rate) * 100) / 100;

            if(!$scope.model.realM)
                $scope.model.gameM = "";
        };

        $scope.onChangeGameMoney = function() {
            inputControl();

            console.log();
            if($scope.model.gameM && $scope.currentServer)
                $scope.model.realM = Math.floor(($scope.model.gameM * $scope.currentServer.rate) * 100) / 100;

            if(!$scope.model.gameM)
                $scope.model.realM = "";
        };

        $scope.send = function() {

        };

        function findServer(name) {
            var result = null;

            if(!name || !$scope.info.servers || !$scope.info.servers.length)
                return null;

            angular.forEach($scope.info.servers, function(v) {
                if(v.name === name)
                    result = v;
            });

            return result;
        }

        function inputControl() {
            if(!$scope.currentServer && $scope.info.servers && $scope.info.servers[0]) {
                $scope.currentServer = $scope.info.servers[0];
                $scope.model.server = $scope.currentServer.name;
            }


        }
    }]);