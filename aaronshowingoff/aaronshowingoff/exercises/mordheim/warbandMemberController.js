(function () {

    var warbandMembers = function ($scope, $routeParams, warbandsFactory) {

        var warbandMemberId = $routeParams.warbandMemberID;
        $scope.warbandMemberNames = "Rex";

        function init() {
            //search warbandMembers for the correct MemberID
            for (var i = 0, len = $scope.warbands.length; i < len; i++) {
                if ($scope.warbands[i].id === parseInt(warbandMemberId)) {
                    $scope.warbandMemberNames += $scope.warbands[i].warbandMemberNames;
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