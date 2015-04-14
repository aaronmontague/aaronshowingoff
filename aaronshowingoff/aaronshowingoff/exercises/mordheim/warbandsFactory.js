(function() {
    var warbandsFactory = function() {
        var warbands = [
            { id: 1, name: 'Crushers', type: 'Beastmen', members: [{ name: 'Rend' }, { name: 'Chopper' }] },
            { id: 2, name: 'Minx', type: 'Sisters of Sigmar', members: [{ name: 'Dalia' }, { name: 'Sister Agnus' }] }
        ];

        var factory = {};

        factory.getWarbands = function () {
            return warbands;
        };

        return factory;
    };

    angular.module('warbandApp')
        .factory('warbandsFactory', warbandsFactory);

}());