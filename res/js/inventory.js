response.addHeader("Access-Control-Allow-Origin", "*")
var inventory_list = angular.module('inventory_list', []);

inventory_list.controller('InventoryListCtrl', function($scope) {
  $scope.inventory_list = [
    {"name": "Lenovo",
     "procesor": "Intel i5",
     "age": 2011},
    {"name": "Toshiba",
     "procesor": "Intel i7",
     "age": 2010},
    {"name": "Toshiba",
     "procesor": "Intel core 2 duo",
     "age": 2008},
    {"name": "HP",
     "procesor": "Intel core 2 duo",
     "age": 2012},
    {"name": "Acer",
     "procesor": "AMD",
     "age": 2006},
    {"name": "Lenovo",
     "procesor": "Intel i5",
     "age": 2009},
    {"name": "Toshiba",
     "procesor": "Intel i7",
     "age": 2008},
    {"name": "Lenovo",
     "procesor": "Intel i5",
     "age": 2011},
    {"name": "Toshiba",
     "procesor": "Intel i7",
     "age": 2010},
    {"name": "Toshiba",
     "procesor": "Intel core 2 duo",
     "age": 2008},
    {"name": "HP",
     "procesor": "Intel core 2 duo",
     "age": 2012},
    {"name": "Acer",
     "procesor": "AMD",
     "age": 2006},
    {"name": "Lenovo",
     "procesor": "Intel i5",
     "age": 2009},
    {"name": "Toshiba",
     "procesor": "Intel i7",
     "age": 2008},
    {"name": "Lenovo",
     "procesor": "Intel i5",
     "age": 2011},
    {"name": "Toshiba",
     "procesor": "Intel i7",
     "age": 2010},
    {"name": "Toshiba",
     "procesor": "Intel core 2 duo",
     "age": 2008},
    {"name": "HP",
     "procesor": "Intel core 2 duo",
     "age": 2012},
    {"name": "Acer",
     "procesor": "AMD",
     "age": 2006},
    {"name": "Lenovo",
     "procesor": "Intel i5",
     "age": 2009},
    {"name": "Toshiba",
     "procesor": "Intel i7",
     "age": 2008}
  ];
  $scope.orderList = "name";
});