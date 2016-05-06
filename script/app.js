"use strict";

angular.module('lt2',
    [
        'ui.router',
        'ngStorage',
        'ngDialog'
    ])
    .config(function ($stateProvider, $urlRouterProvider) {

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
            .state('faq', {
                url: "/faq",
                templateUrl: "partials/faq.html",
                controller: 'FAQController'
            })
            .state('boost', {
                url: "/boost",
                templateUrl: "partials/boost.html",
                controller: 'BoostController',
                params: {
                    object: null
                }
            })
            .state('static', {
                url: "/static",
                templateUrl: "partials/static.html"
            })

            .state('static.suppliers', {
                url: "/suppliers",
                templateUrl: "partials/static/suppliers.html"
            })
            .state('static.guarantee', {
                url: "/guarantee",
                templateUrl: "partials/static/guarantee.html"
            })
            .state('static.reviews', {
                url: "/reviews",
                templateUrl: "partials/static/reviews.html"
            })

            .state('static.contacts', {
                url: "/contacts",
                templateUrl: "partials/static/contacts.html"
            });
    }).run(function ($rootScope) {
        $rootScope.$on('$stateChangeStart',
            function (event, toState, toParams, fromState, fromParams) {
                var element = document.body;
                var to = 0;
                var duration = 600;
                if (duration <= 0) return;
                var difference = to - element.scrollTop;
                var perTick = difference / duration * 10;

                setTimeout(function () {
                    element.scrollTop = element.scrollTop + perTick;
                    if (element.scrollTop === to) return;
                    scrollTo(element, to, duration - 10);
                }, 10);
            })
    });