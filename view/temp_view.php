<html ng-app="fetch">
    <head>
    <title>AngularJS GET request with PHP</title>
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.24/angular.min.js"></script>
    </head>

    <body>
    <br>
      <div class="row">
        <div class="container">
          <h1>Angular $http GET Ajax Call</h1>
          <div ng-controller="dbCtrl">
          <input type="text" ng-model="searchFilter" class="form-control">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Purchase</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="hr_inventory in data | filter:searchFilter">
                        <td>{{hr_inventory.item}}</td>
                        <td>{{hr_inventory.price}}</td>
                        <td>{{hr_inventory.unit}}</td>
                        <td>{{hr_inventory.purchase}}</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </body>

    <script>
        var fetch = angular.module('fetch', []);

        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("temp_php.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

    </script>

    </html>

    