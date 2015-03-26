(function() {
    var catsFactory = function() {
        var cats = [
            { id: 1, name: 'Fluffy', born: '2012-02-18', city: 'Peioria', nicknames: [{ name: 'Bouncy' }] },
            { id: 2, name: 'Minx', born: '2012-04-11', city: 'Brandon', nicknames: [{ name: 'You!' }, { name: 'Funny Girl' }] },
            { id: 3, name: 'Kiki', born: '2011-12-08', city: 'Oakdale', nicknames: [{ name: 'Kitty' }, { name: 'Mouser' },, { name: 'Gopher Getter' }] },
            { id: 4, name: 'Martin', born: '2010-05-11', city: 'Brandon', nicknames: [{ name: 'Death' }] },
            { id: 5, name: 'KC', born: '2013-09-19', city: 'Springfield', nicknames: [{ name: 'Render' }, { name: 'Head Scratch' }] },
            { id: 6, name: 'Crayfish', born: '2002-05-23', city: 'Sudbury', nicknames: [{ name: 'Lovey' }] }
        ];

        var factory = {};

        factory.getCats = function() {
            return cats;
        };

        return factory;
    };

    angular.module('crazyCatLadyApp')
        .factory('catsFactory', catsFactory);

}());