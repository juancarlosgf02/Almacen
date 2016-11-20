// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);
// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {
	$routeProvider
		.when('/inicio', {
			templateUrl	: 'Principal/inicio.html',
			controller 	: 'mainController'
		})
		.when('/distribucion', {
			templateUrl	: 'Principal/addproduct.html',
			controller 	: 'mainController'
		})
		.when('/agregarcodigo', {
			templateUrl	: 'Principal/add-code.php',
			controller 	: 'mainController'
		})
		.when('/viewproduct', {
			templateUrl : 'Principal/viewproduct.html',
			controller 	: 'mainController'
		})
		.when('/modifystock', {
			templateUrl : 'Principal/modifystock.html',
			controller 	: 'mianController'
		})
		.when('/modifydescrip', {
			templateUrl	: 'Principal/modifydescrip.html',
			controller 	: 'mainController'
		})
		.when('/deletecode', {
			templateUrl	: 'Principal/deletecode.html',
			controller 	: 'mainController'
		})
		.when('/import', {
			templateUrl	: 'Principal/csv.html',
			controller 	: 'mainController'
		})

		.when('/listproduct', {
			templateUrl	: 'Principal/listproduct.php',
			controller 	: 'mainController'
		})
		.when('/informacion', {
			templateUrl	: 'Principal/infocode.php',
			controller 	: 'mainController'
		})
		.when('/employee', {
			templateUrl	: 'Principal/employee.php',
			controller 	: 'mainController'
		})
		.when('/empleado', {
			templateUrl	: 'Principal/empleado.php',
			controller 	: 'mainController'
		})
		.otherwise({
			redirectTo: '/'
		});
});
angularRoutingApp.controller('mainController', function($scope) {
$scope.message = '';

});
