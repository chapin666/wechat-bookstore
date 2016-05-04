var app = angular.module('app', []);

app.controller('categoryCtrl',   ['$scope', 'multipartForm',  function($scope, multipartForm){
       $scope.category = {};
       $scope.Submit = function() {
       	var uploadUrl = "/Admin/Category/save";
       	multipartForm.post(uploadUrl,  $scope.category);
       };
}]);