(function () {

    var warbandMembers = function ($scope, $routeParams, warbandsFactory) {

        var warbandId = $routeParams.warbandId;
        $scope.warbandMemberNames = null;

        function init() {
            //search warbandMembers for the correct Members
            for (var i = 0, len = $scope.warbands.length; i < len; i++) {
                if ($scope.warbands[i].id === parseInt(warbandId)) {
                    $scope.warbandMemberNames = $scope.warbands[i].members;
                    break;
                }
            }
        };

        //grab the members of the various warbands
        $scope.warbands = warbandsFactory.getWarbands();

        init();
    };

    //protect against minification
    warbandMembers.$inject = ['$scope', '$routeParams', 'warbandsFactory'];

    angular.module('warbandApp')
        .controller('WarbandMembersController', warbandMembers);

}());