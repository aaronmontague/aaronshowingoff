(function() {
    var warbandsFactory = function() {
        var warbands = [
            { id: 1, name: 'Crushers', born: '2012-02-18', city: 'Peioria', members: [{ name: 'Bouncy' }, { name: 'Spazzo' }] },
            { id: 2, name: 'Minx', born: '2012-04-11', city: 'Brandon', members: [{ name: 'You!' }, { name: 'Funny Girl' }] }
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