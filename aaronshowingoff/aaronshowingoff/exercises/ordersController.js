(function () {

    var ordersController = function ($scope, $routeParams, customersFactory) {

        var customerId = $routeParams.customerId;
        $scope.customer = null;

        function init() {
            //search for customers for the customerID
            $scope.customer = customersFactory.getCustomer(customerId);
        }

        init();
    };

    //protect against minification
    ordersController.$inject = ['$scope', '$routeParams', 'customersFactory'];

    angular.module('customersApp')
        .controller('OrdersController', ordersController);

}());