var app = angular.module('app', []);

app.controller('categoryCtrl',  ['$scope', 'multipartForm',  function($scope, multipartForm){
       $scope.category = {};

       $scope.Submit = function() {
           var uploadUrl = "/Admin/Category/save";
           multipartForm.post(uploadUrl,  $scope.category)
                        .then(function(response) {
                        	document.querySelector("dialog").close();
                        	if (response.status == 200) {
                        		 var snackbarContainer = document.querySelector('#demo-toast-example');
                                 var data = {message: '添加图书分类成功'};
                                 snackbarContainer.MaterialSnackbar.showSnackbar(data);
                                 window.location.reload(false);
                        	} else {
								
							}

                        });
       };
}]);