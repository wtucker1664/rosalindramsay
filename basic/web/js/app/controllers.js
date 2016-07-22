var controllers = angular.module('controllers', []);
var searchType = "HotList";
controllers.controller('MainController', ['$scope', '$location', '$window','$http','$rootScope',
    function ($scope, $location, $window,$http,$rootScope) {
	$rootScope.adFilter = false;
	$rootScope.dataTableTitle = "";
        $scope.loggedIn = function() {
            return Boolean($window.localStorage.getItem('access_token'));
        };
        $scope.logout = function () {
            $window.localStorage.removeItem('access_token');
            $location.path('/login').replace();
        };
        
        $scope.search = function(keyEvent){
        	if (keyEvent.which === 13){
        		
        		
        		var search = "";
        		
        		if(angular.element(document.querySelector('#search')).val() != ""){
        			search = "&q="+angular.element(document.querySelector('#search')).val();
        		}
        		
        		var advanced = "";
        		if(angular.element(document.querySelector('input[name=prefix__from_submit]')).val() != ''){
        			advanced += "&dateFrom="+angular.element(document.querySelector('input[name=prefix__from_submit]')).val();
        		}
        		
        		if(angular.element(document.querySelector('input[name=prefix__to_submit]')).val() != ''){
        			advanced += "&dateTo="+angular.element(document.querySelector('input[name=prefix__to_submit]')).val();
        		}
        		
        		if(angular.element(document.querySelector('#genre')).val() != 'Options'){
        			advanced += "&genre="+angular.element(document.querySelector('#genre')).val();
        		}
        		
        		if(angular.element(document.querySelector('#subGenre')).val() != 'Options'){
        			advanced += "&subGenre="+angular.element(document.querySelector('#subGenre')).val();
        		}
        		
        		if(searchType == "Other"){
        			$rootScope.dataTableTitle = "Results";
            		$location.path('/').replace();
            	
            		searchType = "Books";
            	}
        		
            	if(searchType == "Books"){
            		$http.get('api/books?page=1'+search+advanced).success(function (data) {
            	    	
            			$rootScope.books = data;
            			$rootScope.pagination = [];
            	  		var numPagesDisplay =5;
            	  		for(var i=1;i<numPagesDisplay;i++){
            	  			$rootScope.pagination.push({"page":i,"currentPage":1})
            	  		}
            	     });
            	}
            	if(searchType == "HotList"){
            		$http.get('api/hotlist?page=1'+search+advanced).success(function (data) {
            	    	
            			$rootScope.hotList = data.hotList;
            			$rootScope.pagination = [];
            	  		var numPagesDisplay =5;
            	  		for(var i=1;i<numPagesDisplay;i++){
            	  			$rootScope.pagination.push({"page":i,"currentPage":1})
            	  		}
            	     });
            	}
            	
            	
        	}
        	    
        };
        
        $scope.advancedFilter = function(){
        	$rootScope.adFilter = true;
        };
        $scope.advancedFilterClose = function(){
        	$rootScope.adFilter = false;
        	$rootScope.dataTableTitle = "Most Recent";
        };
        
        $rootScope.advancedSearch = function(){
        	var search = "";
    		
    		if(angular.element(document.querySelector('#search')).val() != ""){
    			search = "&q="+angular.element(document.querySelector('#search')).val();
    		}
    		
    		var advanced = "";
    		if(angular.element(document.querySelector('input[name=prefix__from_submit]')).val() != ''){
    			advanced += "&dateFrom="+angular.element(document.querySelector('input[name=prefix__from_submit]')).val();
    		}
    		
    		if(angular.element(document.querySelector('input[name=prefix__to_submit]')).val() != ''){
    			advanced += "&dateTo="+angular.element(document.querySelector('input[name=prefix__to_submit]')).val();
    		}
    		
    		if(angular.element(document.querySelector('#genre')).val() != 'Options'){
    			advanced += "&genre="+angular.element(document.querySelector('#genre')).val();
    		}
    		
    		if(angular.element(document.querySelector('#subGenre')).val() != 'Options'){
    			advanced += "&subGenre="+angular.element(document.querySelector('#subGenre')).val();
    		}
    		
        	if(searchType == "Books"){
        		$http.get('api/books?page=1'+search+advanced).success(function (data) {
        	    	
        			$rootScope.books = data;
        			$rootScope.pagination = [];
        	  		var numPagesDisplay =5;
        	  		for(var i=1;i<numPagesDisplay;i++){
        	  			$rootScope.pagination.push({"page":i,"currentPage":1})
        	  		}
        	     });
        	}
        	if(searchType == "HotList"){
        		$http.get('api/hotlist?page=1'+search+advanced).success(function (data) {
        	    	
        			$rootScope.hotList = data.hotList;
        			$rootScope.pagination = [];
        	  		var numPagesDisplay =5;
        	  		for(var i=1;i<numPagesDisplay;i++){
        	  			$rootScope.pagination.push({"page":i,"currentPage":1})
        	  		}
        	     });
        	}
        }
}]);

controllers.controller('AdminController', ['$scope', '$http',function ($scope, $http) {
	searchType = "Other";
	$rootScope.dataTableTitle = "";
	$http.get('api/admin').success(function (data) {
        $scope.user = data;
        
     });
	$scope.resetPassword = function(){
		var pass = angular.element(document.querySelector('#password'));
		var postData = $.param({
			'pass': pass.val()
	    });
		var config = {
	            headers : {
	                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
	            }
	        }

		 $http.post('api/restpassword',postData,config).success(function (data) {
			 if(data.success){
				 toastr.success('Password Updated', 'Access Details', {timeOut: 5000})
			 }else{
				 toastr.error('Unable to update Password', 'ERROR!!!', {timeOut: 5000})
				
			 }
			 
	        
	    });
	}
}]);

controllers.controller('ReportsController', ['$scope', '$http',function ($scope, $http) {
	searchType = "Other";
	$rootScope.dataTableTitle = "";
}]);

controllers.controller('HotlistController', ['$scope', '$http','$rootScope',function ($scope, $http,$rootScope) {
    searchType = "HotList";
    $rootScope.dataTableTitle = "";
    jQuery('.datepicker').pickadate({formatSubmit: 'yyyy/mm/dd',
  hiddenPrefix: 'prefix__',
});
    $scope.pageNumber = 1;
    
    $scope.nextPage = function(){
    	$scope.pageNumber++;
    	if($scope.pageNumber > $scope.books.numPages){
    		$scope.pageNumber = $scope.books.numPages
    	}
    	$http.get('api/hotlist?page='+$scope.pageNumber).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.hotList = data.hotList;
            $rootScope.pagination = [];
      		var numPagesDisplay = $scope.pageNumber + 5;
      		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
      		}
         });
    }
    
    $scope.lastPage = function(){
    	
    	
    	$http.get('api/hotlist?page='+$scope.books.numPages).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.hotList = data.hotList;
            $rootScope.pagination = [];
      		var numPagesDisplay = $scope.books.numPages - 5;
      		for(var i=numPagesDisplay;i<=data.numPages;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.books.numPages})
      		}
           // $scope.dataLoaded = true;
         });
    }
    
    $scope.previousPage = function(){
    	$scope.pageNumber--;
    	if($scope.pageNumber == 0){
    		$scope.pageNumber = 1;
    	}
    	$http.get('api/hotlist?page='+$scope.pageNumber).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.hotList = data.hotList;
            $rootScope.pagination = [];
      		var numPagesDisplay = $scope.pageNumber + 5;
      		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
      		}
           // $scope.dataLoaded = true;
         });
    }
    
    $scope.firstPage = function(){
    	
    		$scope.pageNumber = 1;
    	
    	$http.get('api/hotlist?page='+$scope.pageNumber).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.hotList = data.hotList;
    		$rootScope.pagination = [];
      		var numPagesDisplay = $scope.pageNumber + 5;
      		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
      		}
         });
    }
    
    $scope.getData = function(pageNum){
    	$scope.pageNumber = pageNum;
    	$http.get('api/hotlist?page='+pageNum).success(function (data) {
    		$rootScope.hotList = data.hotList;
    		 $rootScope.totalPages = data.numPages;
      		$rootScope.pagination = [];
      		var numPagesDisplay = pageNum + 5;
      		for(var i=pageNum;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":pageNum})
      		}
         });
    }
	
       $http.get('api/hotlist?page='+$scope.pageNumber).success(function (data) {
    	   $rootScope.hotList = data.hotList;
    	   $rootScope.totalPages = data.numPages;
    	   $rootScope.pagination = [];
     		var numPagesDisplay = $scope.pageNumber + 5;
     		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
     			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
     		}
           })
}]);

controllers.controller('HomeController', ['$scope', '$location', '$window', '$http','$rootScope',function ($scope, $location, $window,$http,$rootScope) {
    $scope.isLoggedIn = function() {
    	 return Boolean($window.localStorage.getItem('access_token'));
    };
    searchType = "Books";
    if($rootScope.dataTableTitle == ""){
    	$rootScope.dataTableTitle = "Most Recent";
    }
    
    jQuery('.datepicker').pickadate({formatSubmit: 'yyyy/mm/dd',
    	  hiddenPrefix: 'prefix__',
    });
    $scope.pageNumber = 1;
    
    $scope.nextPage = function(){
    	$scope.pageNumber++;
    	if($scope.pageNumber > $scope.books.numPages){
    		$scope.pageNumber = $scope.books.numPages
    	}
    	$http.get('api/books?page='+$scope.pageNumber).success(function (data) {
        	
    		$rootScope.books = data;
            $rootScope.pagination = [];
      		var numPagesDisplay = $scope.pageNumber + 5;
      		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
      		}
         });
    }
    
    $scope.lastPage = function(){
    	
    	
    	$http.get('api/books?page='+$scope.books.numPages).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.books = data;
            $rootScope.pagination = [];
      		var numPagesDisplay = $scope.books.numPages - 5;
      		for(var i=numPagesDisplay;i<=$scope.books.numPages;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.books.numPages})
      		}
           // $scope.dataLoaded = true;
         });
    }
    
    $scope.previousPage = function(){
    	$scope.pageNumber--;
    	if($scope.pageNumber == 0){
    		$scope.pageNumber = 1;
    	}
    	$http.get('api/books?page='+$scope.pageNumber).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.books = data;
            $rootScope.pagination = [];
      		var numPagesDisplay = $scope.pageNumber + 5;
      		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
      		}
           // $scope.dataLoaded = true;
         });
    }
    
    $scope.firstPage = function(){
    	
    		$scope.pageNumber = 1;
    	
    	$http.get('api/books?page='+$scope.pageNumber).success(function (data) {
    		 $rootScope.totalPages = data.numPages;
    		$rootScope.books = data;
    		$rootScope.pagination = [];
      		var numPagesDisplay = $scope.pageNumber + 5;
      		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":$scope.pageNumber})
      		}
         });
    }
    
    $scope.getData = function(pageNum){
    	$scope.pageNumber = pageNum;
    	$http.get('api/books?page='+pageNum).success(function (data) {
    		$rootScope.books.books = data.books;
    		 $rootScope.totalPages = data.numPages;
      		$rootScope.pagination = [];
      		var numPagesDisplay = pageNum + 5;
      		for(var i=pageNum;i<numPagesDisplay;i++){
      			$rootScope.pagination.push({"page":i,"currentPage":pageNum})
      		}
         });
    }
    
    $http.get('api/books?page='+$scope.pageNumber).success(function (data) {
    	 $rootScope.totalPages = data.numPages;
    	$rootScope.books = data;
    	$rootScope.pagination = [];
  		var numPagesDisplay = $scope.pageNumber + 5;
  		for(var i=$scope.pageNumber;i<numPagesDisplay;i++){
  			$rootScope.pagination.push({"page":i,"currentPage":$rootScope.pageNumber})
  		}
     });
    
    
    
}]);

controllers.controller('BookController', ['$scope', '$location', '$window', '$http','$routeParams',function ($scope, $location, $window,$http,$routeParams) {
		var bookID = $routeParams.bookid;
		var postData = $.param({
			'bookID': bookID
        });
		var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }

		 $http.post('api/book',postData,config).success(function (data) {
			 $scope.book = data;
	     });
		
}]);

controllers.controller('AuthorController', ['$scope', '$location', '$window', '$http','$routeParams',function ($scope, $location, $window,$http,$routeParams) {
	var authorID = $routeParams.authorid;

	var postData = $.param({
		'authorID': authorID
    });
	var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

	 $http.post('api/author',postData,config).success(function (data) {
		 $scope.author = data.details.author;
		 $scope.books = data.details.books;
     });
	
}]);
                                           

controllers.controller('LoginController', ['$scope', '$http', '$window', '$location',
   function($scope, $http, $window, $location) {
       $scope.login = function () {
           $scope.submitted = true;
           $scope.error = {};
           $http.post('api/login', $scope.userModel).success(
           function (data) {
        	   
               $window.localStorage.setItem('access_token',data.access_token);
               $location.path('/').replace();
           }).error(
               function (data) {
                   angular.forEach(data, function (error) {
                       $scope.error[error.field] = error.message;
                   });
               }
           );
       };
   }]);