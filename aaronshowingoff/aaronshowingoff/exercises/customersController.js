function CustomersController($scope) {
    $scope.customers = [
        { name: 'Mike', joined: '2012-02-18', city: 'San Francisco', orderTotal: 9.9912 },
        { name: 'Shannon', joined: '2012-04-11', city: 'San Francisco', orderTotal: 27.89 },
        { name: 'Peter', joined: '2011-12-08', city: 'Orlando', orderTotal: 109.483782 },
        { name: 'Smyth', joined: '2010-05-11', city: 'Scottsdale', orderTotal: 43.22 },
        { name: 'Borgy', joined: '2013-02-19', city: 'Burlington', orderTotal: 56.99 }
    ];
    $scope.doSort = function (paramName) {
        $scope.sortBy = paramName;
        $scope.reverse = !$scope.reverse;
    };
}