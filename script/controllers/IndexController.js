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
            });

        $scope.createWidget = function() {
        //    var widgets = document.getElementById('vk_groups');
        //widgets.innerHTML = "";
        //var block = document.getElementsByClassName('left-block')[0];
       //var width = block.offsetWidth;
       //var height = 300;
       //     VK.Widgets.Group("vk_groups", {mode: 0, width: width, height: height, color1: 'EDE7F6', color2: '3B4D58', color3: '3B4D58'}, 120761016);
        };

        window.onresize = function() {
          //  $scope.createWidget();
        };

        window.onresize();
    }]);