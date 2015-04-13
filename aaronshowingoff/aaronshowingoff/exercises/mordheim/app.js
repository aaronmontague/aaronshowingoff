(function () {

    var app = angular.module('warbandApp', ['ngRoute']);

    app.config(function ($routeProvider) {
        $routeProvider
            .when('/',
            {
                controller: 'WarbandsController',
                templateUrl: 'warbandTemplate.html'
            })
            .when('/warbands/:warbandID',
            {
                controller: 'WarbandsController',
                templateUrl: 'warbandTemplate.html'
            })
            .when('/warbandMember/:warbandMemberID',
            {
                controller: 'WarbandMembersController',
                templateUrl: 'warbandMemberTemplate.html'
            })
            .otherwise({ redirectTo: '/' });
    });

    var appCrazyCat = angular.module('crazyCatLadyApp', ['ngRoute']);

    appCrazyCat.config(function ($routeProvider) {
        $routeProvider
            .when('/',
            {
                controller: 'CustomersController',
                templateUrl: 'catTemplate.html'
            })
            .when('/fluffy/:catId',
            {
                controller: 'CatNickNameController',
                templateUrl: 'catNickNameTemplate.html'
            }
            )
            .otherwise({ redirectTo: '/' });
    });

}());
