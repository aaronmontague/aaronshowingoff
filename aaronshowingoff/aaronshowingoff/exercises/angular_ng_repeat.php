<!DOCTYPE html>
<html lang="en">

<head>
<script ></script>
</head>

<body>
<div data-ng-app="nameSwap" data-ng-controller="formController">
    <h3>Iterating through data with ng-repeat</h3>
    <ul>
        <li data-ng-repeat="bonk in people">{{ bonk.name }} lives in {{bonk.city}}</li>
    </ul>

    <table>
        <tr>
            <th>Name</th>
            <th>City</th>
        </tr>
        <tr data-ng-repeat="bonk in people">
            <td>{{ bonk.name }}</td>
            <td>{{ bonk.city }}</td>
        </tr>
    </table>
    <br />
    <select data-ng-model="currentSelection" data-ng-options="bonk.name for bonk in people">
    </select>
    <span>The selected person resides in: {{ currentSelection.city }}</span>
</div>

<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js">
</script>
    
<script>
var app = angular.module("nameSwap", []);

app.controller("formController", function($scope) {
    $scope.people = [
        {name: 'Aaron', city:'Brookline'},
        {name: 'Renee', city:'Somerville'},
        {name: 'Shannon', city:'San Fran'},
        {name: 'Mike', city:'San Fran'}
    ];
    $scope.currentSelection = $scope.people[0];
    $scope.reset = function() {
        $scope.user = angular.copy($scope.master);
    };
    
});    
</script>

</body>
</html>
