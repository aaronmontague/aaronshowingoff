<!DOCTYPE html>
<html>

<head>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<style>
    table, th , td {
      border: 1px solid grey;
      border-collapse: collapse;
      padding: 5px;
    }
    table tr:nth-child(odd) {
      background-color: #f1f1f1;
    }
    table tr:nth-child(even) {
      background-color: #ffffff;
    }
</style>
</head>

<body>

<div ng-app="" ng-controller="customersController"> 

<table>
<tr>
<th>Customer Name</th>
<th>City</th>
<th>Country</th>
</tr>
  <tr ng-repeat="x in spork | orderBy: 'Country'">
    <td>{{ x.Name }}</td>
    <td>{{ x.City }}</td>
    <td>{{ x.Country }}</td>
  </tr>
</table>

</div>

<script>
function customersController($scope,$http) {
  $http.get("json.php")
  .success(function(response) {$scope.spork = response;});
}
</script>

</body>
</html>