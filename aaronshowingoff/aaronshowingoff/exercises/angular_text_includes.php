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

<script src= "nameSwapModule.js"></script>
<script src= "nameSwapController.js"></script>

</body>
</html>
