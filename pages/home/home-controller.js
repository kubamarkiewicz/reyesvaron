app.controller('HomeController', function($scope, $rootScope, $http, $routeParams, config, ParallaxService) {  

	$(function() {

		$('#homeCarousel').carousel({
			interval: 1500
		});

	});

    ParallaxService.add($('section#home-salmon'), true);
    ParallaxService.add($('section#home-salmon-details'));

    ParallaxService.add($('section#home-bacalao'), true);
    ParallaxService.add($('section#home-bacalao-details'));

    ParallaxService.add($('section#home-atun'), true);
    ParallaxService.add($('section#home-atun-details'));


});