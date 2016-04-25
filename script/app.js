"use strict";

angular.module('lt2',
    [
        'ui.router',
        'ngStorage'
    ])
    .config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/main");
    //
    // Now set up the states
    $stateProvider
        .state('main', {
            url: "/main",
            templateUrl: "partials/main.html",
            controller: 'MainPageController'
        })
        .state('items', {
            url: "/items",
            templateUrl: "partials/items.html",
            controller: 'ItemsController',
            params: {
                object: null
            }
        })
        .state('accounts', {
            url: "/accounts",
            templateUrl: "partials/accounts.html",
            controller: 'AccountsController',
            params: {
                object: null
            }
        })
        .state('calculator', {
            url: "/calculator",
            templateUrl: "partials/calculator.html",
            controller: 'CalculatorController',
            params: {
                object: null
            }
        })
        .state('static', {
            url: "/static",
            templateUrl: "partials/static.html"
        })
        .state('static.boost', {
            url: "/boost",
            templateUrl: "partials/static/boost.html"
        })
        .state('static.guarantee', {
            url: "/guarantee",
            templateUrl: "partials/static/guarantee.html"
        })
        .state('static.reviews', {
            url: "/reviews",
            templateUrl: "partials/static/reviews.html"
        })
        .state('static.faq', {
            url: "/faq",
            templateUrl: "partials/static/faq.html"
        })
        .state('static.contacts', {
            url: "/contacts",
            templateUrl: "partials/static/contacts.html"
        });
});