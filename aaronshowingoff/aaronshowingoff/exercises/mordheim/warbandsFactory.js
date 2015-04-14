(function() {
    var warbandsFactory = function() {
        var warbands = [
            { id: 1, name: 'Crushers', type: 'Beastmen', members: [{ name: 'Rend', position: 'Hero' }, { name: 'Chopper', position: 'Hero' }, { name: 'The Flayers', position: 'Henchmen' }] },
            { id: 2, name: 'Holy Hammers', type: 'Sisters of Sigmar', members: [{ name: 'Dalia', position: 'Hero' }, { name: 'Sister Agnus', position: 'Hero' }] }
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