(function(){
	var app = angular.module('rosRamsay',['ngRoute','mgcrea.ngStrap','controllers' ]);
	
	app.config(['$routeProvider', '$httpProvider',
	            function($routeProvider, $httpProvider) {
		$routeProvider
			.when("/",{
				controller:"HomeController",
				templateUrl:'js/app/views/home.html'
			})
			.when("/hotlist",{
				controller:"HotlistController",
				templateUrl:"js/app/views/hotlist.html"
			})
			.when("/reports",{
				controller:"",
				templateUrl:"js/app/views/reports.html"
			})
			.when("/admin",{
				controller:"AdminController",
				templateUrl:"js/app/views/admin.html"
			})
			.when("/login",{
				controller:"LoginController",
				templateUrl:"js/app/views/login.html"
			}).when("/book/:bookid",{
				controller:"BookController",
				templateUrl:"js/app/views/book.html"
			}).when("/author/:authorid",{
				controller:"AuthorController",
				templateUrl:"js/app/views/author.html"
			}).when("/reports",{
				controller:"ReportsController",
				templateUrl:"js/app/views/reports.html"
			})
			.otherwise({
                templateUrl: 'js/app/views/404.html'
            });
	$httpProvider.interceptors.push('authInterceptor');
}
]);
	
	app.factory('authInterceptor', function ($q, $window, $location) {
	    return {
	        request: function (config) {
	        
	            if ($window.localStorage.getItem('access_token')) {
	                //HttpBearerAuth
	 
	                config.headers.Authorization = 'Bearer ' + $window.localStorage.getItem('access_token');
	            }
	            return config;
	        },
	        responseError: function (rejection) {
	        	console.log(rejection);
	            if (rejection.status === 401) {
	                $location.path('/login').replace();
	            }
	            return $q.reject(rejection);
	        }
	    };
	});
	
	app.directive('hotHotList',function(){
		var url = "api/hothotlist";
		return{
			template:"<table width='100%' class='table table-striped'>" +
					"<thead class='thead-inverse primary-color-dark white-text'>" +
					"<tr>" +
					"<th>" +
					"<span class='glyphicon glyphicon-list' aria-hidden='true'></span> Hot Hot List" +
					"</th>" +
					"</tr>" +
					"</thead>" +
					"<tr ng-repeat='hotList in dHotHotList | limitTo:5' >" +
					"<td>" +
					"<span class='glyphicon glyphicon-star orange-text' aria-hidden='true'></span> " +
					"<a href='#/book/{{hotList.bookID}}'>{{ hotList.Title }}</a>, <a href='#/author/{{hotList.authorID}}'>{{ hotList.Author }}</a>" +
					"</td>" +
					"</tr>" +
					"</table>",
			transclude: true,
			controller:['$scope','$element','$http',function($scope,$element,$http){
				
				$http.get(url).success(function (data) {
					$scope.dHotHotList = data.hotHotList;


			     });
			}]
		}
	});
	
	app.directive('news',function(){
		var url = "api/hothotlist";
		return{
			template:"<table width='100%' class='table table-striped'>" +
					"<thead class='thead-inverse primary-color-dark white-text'>" +
					"<tr>" +
					"<th>" +
					"<span class='fa fa-comments' aria-hidden='true'></span> News" +
					"</th>" +
					"</tr>" +
					"</thead>" +
					"<tr ng-repeat='new in news | limitTo:5' >" +
					"<td>" +
					"<span class='fa fa-comment' aria-hidden='true'></span> " +
					"{{ new.Title }}" +
					"</td>" +
					"</tr>" +
					"</table>",
			transclude: true,
			controller:['$scope','$element','$http',function($scope,$element,$http){
			    $scope.news = [{"Title":"News Line 1"},{"Title":"News Line 1"},{"Title":"News Line 1"},{"Title":"News Line 1"},{"Title":"News Line 1"}]

//				$http.get(url).success(function (data) {
//					$scope.news = data.news;
//			     });
			}]
		}
	});
	  
})();