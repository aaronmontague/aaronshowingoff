app.controller("formController", function ($scope) {
    $scope.master = { firstName: "John", lastName: "Doe" };
    $scope.switch = 1;
    $scope.reset = function () {
        $scope.user = angular.copy($scope.master);
    };
    $scope.reset();
    $scope.change = function () {
        if ($scope.switch === 1) {
            $scope.master = { firstName: "Trapper", lastName: "John" };
            $scope.switch = 0;
        }
        else {
            $scope.master = { firstName: "John", lastName: "Doe" };
            $scope.switch = 1;
        }
        $scope.reset();
    };
});