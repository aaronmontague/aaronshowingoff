(function () {

    var catNickNameController = function ($scope, $routeParams, catsFactory) {

        var catId = $routeParams.catId;
        $scope.nicknames = null;

        function init() {
            //search for cats for the customerId
            for (var i = 0, len = $scope.cats.length; i < len; i++) {
                if ($scope.cats[i].id === parseInt(catId)) {
                    $scope.nicknames = $scope.cats[i].nicknames;
                    break;
                }
            }
        };

        $scope.cats = catsFactory.getCats();

        init();
    };

    //protect against minification
    catNickNameController.$inject = ['$scope', '$routeParams', 'catsFactory'];

    angular.module('crazyCatLadyApp')
        .controller('CatNickNameController', catNickNameController);

}());