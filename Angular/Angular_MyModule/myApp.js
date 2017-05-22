var myApp = angular.module('myApp',[]);


myApp.controller('MyCtrl1', ['$scope','myFactory', function ($scope, myFactory) {
	$scope.names = [

		{'a':'puk'},
		{'a':'nik'}
	];
	$scope.myFactory = myFactory;
	var today = new Date();
	$scope.today = today;
	$scope.myFunc = function(){
		$scope.hell= "Foo";
	};
}]);
myApp.controller('MyCtrl2', ['$scope','myFactory', function ($scope,myFactory) {
		$scope.myFactory = myFactory;

}]);

myApp.factory('myFactory', [function () {
	

	return {
		hello: 'hello world'
	};
}])