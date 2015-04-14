(function () {

    var app = angular.module('warbandApp', ['ngRoute']);

    app.config(function ($routeProvider) {
        $routeProvider
            .when('/',
            {
                controller: 'WarbandsController',
                templateUrl: 'warbandTemplate.html'
            })
            .when('/warbands/:warbandId',
            {
                controller: 'WarbandMembersController',
                templateUrl: 'warbandMemberTemplate.html'
            })
            .when('/warbandMember/:warbandMemberId',
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
