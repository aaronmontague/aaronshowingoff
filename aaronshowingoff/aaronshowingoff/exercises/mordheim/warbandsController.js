(function () {

    var catLadyCustomers = function ($scope, catsFactory, catSettings) {

        $scope.cats = [];
        $scope.catSettings = catSettings;

        function catInit() {
            $scope.cats = catsFactory.getCats();
        };

        catInit();

        $scope.doSort = function(paramName) {
            $scope.sortBy = paramName;
            $scope.reverse = !$scope.reverse;
        };
    };

    var warbands = function ($scope, warbandsFactory, warbandSettings) {
        
        $scope.warbands = [];
        $scope.warbandSettings = warbandSettings;

        function init() {
            $scope.warbands = warbandsFactory.getWarbands();
        };

        init();

        $scope.doSort = function (paramName) {
            $scope.sortBy = paramName;
            $scope.reverse = !$scope.reverse;
        };
    };

    //protect against minification
    warbands.$inject = ['$scope', 'warbandsFactory', 'warbandSettings'];
    catLadyCustomers.$inject = ['$scope', 'catsFactory','catSettings'];

    angular.module('warbandApp')
        .controller('WarbandsController', warbands);
    angular.module('crazyCatLadyApp')
        .controller('CustomersController', catLadyCustomers);

}());