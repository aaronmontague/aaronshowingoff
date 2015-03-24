<!DOCTYPE html>
<html lang="en" data-ng-app="">

<head>
    <title>AngularJS Test</title>
    <script></script>
</head>

<body data-ng-init="name = 'Jane Doe'">
    <div data-ng-hide="hideName">
        Name:
        <input type="text" data-ng-model="name" />
        <span data-ng-bind="name" />
    </div>
    Hide:
    <input type="checkbox" data-ng-model="hideName" />
    <br />
    <button data-ng-click="name='Cows'">Change Name</button>
    <br />
    <br data-ng-init="colorSwap='blue'" />
    <button data-ng-click="colorSwap='red'">Make Red</button>
    <button data-ng-click="colorSwap='blue'">Make Blue</button>
    <br />
    <div data-ng-switch on="colorSwap">
        <div data-ng-switch-when="red" style="background-color:red;width:10%">Red</div>
        <div data-ng-switch-when="blue" style="background-color:blue;width:10%">Blue</div>
        <br />
        {{ colorSwap}}
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js">

    </script>

</body>
</html>
