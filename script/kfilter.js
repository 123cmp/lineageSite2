"use strict";

angular.module('lt2').filter('kfilter', function() {
    return function(input) {
        input = ("" + input);
        var regex = /000k*$/g;
        var ks = '';
        while(regex.test(input)) {
           input = input.replace(regex, '');
           ks += 'k';
        }

        return input + ks;
    }
});
