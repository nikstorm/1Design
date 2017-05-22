var calcApp = angular.module('CalcApp', ['ngMaterial']);

calcApp.controller('CalcCtrl', ['$scope', function ($scope) {
	$scope.onDigButton = function(digButton){
		//if(!digButton){
		$scope.dig = digButton;
		//console.log(digButton);
	//}
	// else{
	// 	digButton = digButton+1;
	// 	}
	};
}]);