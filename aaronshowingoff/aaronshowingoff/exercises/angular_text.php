<!DOCTYPE html>
<html lang="en">

<head>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
</head>

<body>
<div ng-app="nameSwap" ng-controller="formController">
<form novalidate>
First Name:<br>
<input type="text" ng-model="user.firstName"><br>
Last Name:<br>
<input type="text" ng-model="user.lastName">
<br><br>
<button ng-click="reset()">RESET</button>
<button ng-click="change()">Change</button>
</form>
<p>form = {{user }}</p>
<p>master = {{master}}</p>
</div>


<script>
var app = angular.module("nameSwap", []);

app.controller("formController", function($scope) {
    $scope.master = {firstName:"John", lastName:"Doe"};
    $scope.switch = 1;
    $scope.reset = function() {
        $scope.user = angular.copy($scope.master);
    };
    //$scope.reset();
    $scope.change = function() {
        if ($scope.switch === 1){
        $scope.master = {firstName:"Trapper", lastName:"John"};
        $scope.switch = 0;
    }
    else
    {
        $scope.master = {firstName:"John", lastName:"Doe"};
        $scope.switch = 1;
    }
    //$scope.reset();
    };
});
</script>

</body>
</html>
