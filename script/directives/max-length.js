"use strict";

angular.module('lt2').directive('maxLength',
    function() {
        console.log("asdasda");
        return {
            'restrict': 'A',
            link: function(scope, element, attrs) {
                var max = 0;

                scope.$watch(function() {
                    return attrs.maxLength
                }, function() {
                    if(attrs.maxLength)
                        max = parseInt(attrs.maxLength);
                });

                element[0].onkeydown = function(evt) {
                    console.log(evt.keyCode);
                    if(element[0].value.length >= max) {
                        return (evt.keyCode == 8 ||
                            evt.keyCode == 46 ||
                            evt.keyCode == 9 ||
                            evt.keyCode == 20 ||
                            evt.keyCode == 16 ||
                            evt.keyCode == 93 ||
                            evt.keyCode == 37 ||
                            evt.keyCode == 38 ||
                            evt.keyCode == 39 ||
                            evt.keyCode >= 112 && evt.keyCode <= 123 ||
                            evt.keyCode == 33 ||
                            evt.keyCode == 34 ||
                            evt.keyCode == 35 ||
                            evt.keyCode == 36 ||
                            evt.keyCode == 40 ||
                            evt.keyCode == 12 ||
                            evt.keyCode == 91 )
                    }
                }
            }
        }
    });