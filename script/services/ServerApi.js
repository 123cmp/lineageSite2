"use strict";

angular.module('lt2').factory('ServerApi', ['$q', '$timeout', '$http', function ($q, $timeout, $http) {
    var games = null;

    var fakeItems = [
        {
            name: "Хук на пуджа",
            cost: "100$"
        },
        {
            name: "Хук на пуджа",
            cost: "100$"
        },
        {
            name: "Хук на пуджа",
            cost: "100$"
        }
    ];

    var fakeAccounts = [
        {
            server: "rndserver",
            description: "Эльф 80-го уровня",
            cost: "100$"
        },
        {
            server: "rndserver",
            description: "Эльф 80-го уровня",
            cost: "100$"
        },
        {
            server: "rndserver",
            description: "Эльф 80-го уровня",
            cost: "100$"
        }
    ];

    var fakeGames = [{
        img: 'http://goldbliss.ru/wp-content/themes/MyThemeSite/images/Catalog/catalog-3.png',
        name: 'lineage_ii_free',
        menu: [
            {
                name: 'Купить валюту',
                type: 'calculator',
                params: {
                    currency: 'adena',
                    game: 'lineage_ii_free'
                }
            }
        ]
    }, {
        img: 'http://goldbliss.ru/wp-content/themes/MyThemeSite/images/Catalog/catalog-3.png',
        name: 'lineage_ii_free',
        menu: [
            {
                name: 'Купить Предметы',
                type: 'items',
                params: {
                    game: 'lineage_ii_free'
                }
            },
            {
                name: 'Купить Аккаунт',
                type: 'accounts',
                params: {
                    game: 'lineage_ii_free'
                }
            }
        ]
    }, {
        img: 'http://goldbliss.ru/wp-content/themes/MyThemeSite/images/Catalog/catalog-3.png',
        name: 'lineage_ii_free',
        menu: [
            {
                name: 'Прокачка',
                type: 'boost'
            }
        ]
    }];

    function getGames() {
        var dfd = new $q.defer();

        $http.get('/api/api.php?games=all').then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }

    function getItems(game) {
        var dfd = new $q.defer();

        $http.get('/api/api.php?items=' + game).then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }

    function getAccounts(game) {
        var dfd = new $q.defer();

        $http.get('/api/api.php?accounts=' + game).then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }

    function getBoost(game) {
        var dfd = new $q.defer();

        $http.get('/api/api.php?boost=' + game).then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }

    function getGameServers(game, currency) {
        var dfd = new $q.defer();
        $http.get('/api/api.php?game=' + game + '&currency=' + currency).then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }

    function getText(game, type) {
        var dfd = new $q.defer();
        $http.get('/api/api.php?text=true&game=' + game + '&type=' + type).then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }


    function sendOrder(game, currency, server, nickname, contact, pay, buy, comment) {
        var dfd = new $q.defer();
        console.log(comment);
        $http.post('/api/api.php?orders=true', {
            game_name: game,
            game_server: server,
            currency: currency,
            count: buy,
            game_nick: nickname,
            contact: contact,
            comment: comment
        }).then(function (result) {
            dfd.resolve(result.data);
        });

        return dfd.promise;
    }


    return {
        getGames: getGames,
        getItems: getItems,
        getAccounts: getAccounts,
        getGameServers: getGameServers,
        sendOrder: sendOrder,
        getBoost: getBoost,
        getText: getText
    }
}]);