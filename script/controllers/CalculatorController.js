"use strict";

angular.module('lt2').controller('CalculatorController',
    ['$scope', 'ServerApi', '$state', '$localStorage', 'ngDialog', function($scope, ServerApi, $state, $localStorage, ngDialog) {
        $scope.isServerChoose = false;
        $scope.currentServer = null;

        var params = $state.params.object;
        if(params)  $localStorage.itemsParams = params;
        else params = $localStorage.itemsParams;

        $scope.allValidation = false;

        $scope.model = {
            server: "",
            comment:"",
            nickname: "",
            contact: "",
            realM: "",
            gameM: ""
        };

        $scope.invalid = {};

        $scope.info = {
            maxCommentLength: 150,
            servers: []
        };
        console.log(params);
        var promise = ServerApi.getGameServers(params.game, params.currency);
        promise.then(function(data) {
            $scope.info.servers = data.servers;
        });

        $scope.$watch('model.server', function() {
            if($scope.model.server) {
                $scope.isServerChoose = true;
                $scope.currentServer = findServer($scope.model.server);

                console.log($scope.currentServer);
                $scope.onChangeRealMoney();
            }
        });

        $scope.$watchCollection('model', function() {
            if($scope.allValidation) $scope.validateForm();
        });

        $scope.validateForm = function() {

            $scope.invalid = {
                
            };

            if(!$scope.model.server) $scope.invalid.server = true;
            if(!$scope.model.comment) $scope.invalid.comment = true;
            if(!$scope.model.nickname) $scope.invalid.nickname = true;
            if(!$scope.model.contact) $scope.invalid.contact = true;
            if(!$scope.model.realM) $scope.invalid.realM = true;
            if(!$scope.model.gameM) $scope.invalid.gameM = true;


            return Object.keys($scope.invalid).length == 0;
        };

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
            $scope.allValidation = true;
            if($scope.validateForm()){
                ServerApi.sendOrder(
                    params.game,
                    params.currency,
                    $scope.model.server,
                    $scope.model.contact,
                    $scope.model.realM,
                    $scope.model.gameM,
                    $scope.model.comment
                ).then(function() {
                        ngDialog.open({ template: '<h2>Ваша заявка принята</h2>', plain: true});
                    });
            }

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