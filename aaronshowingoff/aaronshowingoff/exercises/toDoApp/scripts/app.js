(function () {

    var app = angular.module('listMakeApp', ['ngRoute']);

    app.config(function ($routeProvider) {
        $routeProvider
            .when('/',
            {
                controller: 'toDoController',
                templateUrl: 'views/toDoView.html'
            })
            .when('/eggs/',
            {
                controller: 'toDoController',
                templateUrl: 'views/2.html'
            })
            .otherwise({ redirectTo: '/' });
    });

}());