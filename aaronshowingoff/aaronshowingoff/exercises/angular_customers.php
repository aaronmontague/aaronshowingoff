<!DOCTYPE html>
<html lang="en" data-ng-app="">

<head>
    <title>AngularJS Customer Page</title>
    <link href="Styles.css" rel="stylesheet" type="text/css" />
    <script></script>
</head>
    https://www.udemy.com/angularjs-jumpstart/#/lecture/1000214
<body data-ng-controller="CustomersController">
    <h2>Customers</h2>
    Search by Name: <input type="text" data-ng-model="customerFilter.name"/>
    Search by City: <input type="text" data-ng-model="customerFilter.city"/>

    <table>
        <tr>
            <th data-ng-click="doSort('name')">Name</th>
            <th data-ng-click="doSort('city')">City</th>
            <th data-ng-click="doSort('joined')">Date Started</th>
            <th data-ng-click="doSort('orderTotal')">Order Total</th>
        </tr>
        <tr data-ng-repeat="customer in customers | filter:customerFilter | orderBy:sortBy:!reverse">
            <td>{{ customer.name}}</td>
            <td>{{ customer.city}}</td>
            <td>{{ customer.joined | date:'longDate'}}</td>
            <td>{{ customer.orderTotal | currency}}</td>
        </tr>
    </table>
    <br />
    Customer Length: {{ customers.length }}
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    <script src="customersController.js"></script>

</body>
</html>
