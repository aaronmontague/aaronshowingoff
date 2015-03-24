<!DOCTYPE html>
<html lang="en" data-ng-app>

<head>
<script ></script>
</head>

<body>
<div data-ng-init="names=['Dave','Jeff','Heedy','Danny']">
    <h3>Iterating through data with ng-repeat</h3>
    <ul>
        <li data-ng-repeat="bonk in names">{{ bonk }}</li>
    </ul>
</div>


<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js">

</script>

</body>
</html>
