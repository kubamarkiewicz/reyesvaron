app.controller('ProductosController', function($scope, $rootScope, $http, $routeParams, config, $anchorScroll, $timeout) {  

    $scope.onProductsRendered = function() 
    {
        $timeout(function(){
            $anchorScroll();  
        });
    }


	angular.element(document).ready(function() {

	    // smooth scroll to sections
        $('a[href*="#"]').on('click',function (e) {

            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            if (!$target.length) {
                window.location = this.href;
                return;
            }

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });

	});
	

});