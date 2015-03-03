<!DOCTYPE html>
<html>

<head>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
</head>

<body>

<div ng-app="" ng-controller="customersController"> 

<ul>
  <li ng-repeat="x in names">
    {{ x.Name + ', ' + x.Country }}
  </li>
</ul>

</div>

<script>
function customersController($scope,$http) {
  $http.get("json.php")
  .success(function(response) {$scope.names = response;});
}
</script>

</body>
</html>