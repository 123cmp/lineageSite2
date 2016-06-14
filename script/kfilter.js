"use strict";

angular.module('lt2').filter('kfilter', function() {
    return function(input) {
        var result = "";
        input = parseInt(input);
        while((input = input / 1000) >= 1000) result += "k";
        if(input % 1 != 0) input = input.toFixed(2);
        return input + result;
    }
});