(function() {
    var toDoListFactory = function() {
        var toDoListItems = [
            { id: 1, text: 'To Do List', done: true},
            { id: 2, text: 'Feed the Cats', done: false},
            { id: 3, text: 'Share Notes with Dr H.', done: false}
        ];

        var factory = {};
        factory.getToDoListItems = function() {
            return toDoListItems;
        };

        return factory;
    };

    angular.module('listMakeApp')
        .factory('toDoListFactory', toDoListFactory);

}());