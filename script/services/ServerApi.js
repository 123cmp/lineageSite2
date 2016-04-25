"use strict";

angular.module('lt2').factory('ServerApi', ['$q', '$timeout', function ($q, $timeout) {
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
        name: 'dota2',
        menu: [
            {
                name: 'Купить валюту',
                type: 'calculator',
                params: {
                    currency: 'adena',
                    game: 'dota2'
                }
            }
        ]
    }, {
        img: 'http://goldbliss.ru/wp-content/themes/MyThemeSite/images/Catalog/catalog-3.png',
        name: 'AION',
        menu: [
            {
                name: 'Купить Предметы',
                type: 'items',
                params: {
                    game: 'aion'
                }
            },
            {
                name: 'Купить Аккаунт',
                type: 'accounts',
                params: {
                    game: 'aion'
                }
            }
        ]
    }, {
        img: 'http://goldbliss.ru/wp-content/themes/MyThemeSite/images/Catalog/catalog-3.png',
        name: 'CS:GO',
        menu: [
            {
                name: 'Прокачка',
                type: 'boost'
            }
        ]
    }];

    function getGames() {
        var dfd = new $q.defer();

        if (games) {
            dfd.resolve(games);
        } else {
            $timeout(function () {
                games = fakeGames;
                dfd.resolve(games);
            }, 1000);
        }

        return dfd.promise;
    }

    function getItems(game) {
        var dfd = new $q.defer();

        $timeout(function () {
            dfd.resolve(fakeItems);
        }, 1000);

        return dfd.promise;
    }

    function getAccounts(game) {
        var dfd = new $q.defer();

        $timeout(function () {
            dfd.resolve(fakeAccounts);
        }, 1000);

        return dfd.promise;
    }


    return {
        getGames: getGames,
        getItems: getItems,
        getAccounts: getAccounts
    }
}]);