var app2 = angular.module('app2', []);

app2.controller('ctrl1', function($scope) {
	$scope.randomNum1 = Math.floor((Math.random() * 10) + 1)
	$scope.randomNum1 = Math.floor((Math.random() * 10) + 1)
}); 


app2.controller('badCtrl', function($scope) {
	var badFeelings = ["Disregarded", "Unimportant", "Rejected", "Powerless"];

	$scope.bad = badFeelings[Math.floor((Math.random() * 4))];
}); 

app2.controller('goodCtrl', function($scope) {
	var goodFeelings = ["Pleasure", "Awsome", "Lovable", "InnerPeace"];

	$scope.good = goodFeelings[Math.floor((Math.random() * 4))];
});


// var app3 = angular.module('app3', []);

app2.controller('gListCtrl', function($scope) {
	$scope.groceries = [
		{item: "Tomatoes", purchased: false},
		{item: "Potatoes", purchased: false},
		{item: "Bread", purchased: false},
		{item: "Hummus", purchased: false}
	];

	$scope.getList = function() {
		return $scope.showList ? "grocery_ul.html" : "grocery_ol.html";
	}

});