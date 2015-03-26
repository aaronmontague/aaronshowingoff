(function () {

    var app = angular.module('customersApp', ['ngRoute']);

    app.config(function ($routeProvider) {
        $routeProvider
            .when('/',
            {
                controller: 'CustomersController',
                templateUrl: 'customersTemplate.html'
            })
            .when('/orders/:customerId',
            {
                controller: 'OrdersController',
                templateUrl: 'ordersTemplate.html'
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
