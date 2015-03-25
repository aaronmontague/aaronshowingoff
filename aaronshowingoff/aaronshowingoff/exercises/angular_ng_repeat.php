<!DOCTYPE html>
<html lang="en" data-ng-app>

<head>
<script ></script>
</head>

<body>
<div data-ng-init="people=[{name: 'John', city:'Brookline'},{name: 'Renee', city:'Somerville'},{name: 'Shannon', city:'San Fran'},{name: 'Mike', city:'San Fran'},]">
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
</div>


<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js">

</script>

</body>
</html>
