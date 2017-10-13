app.controller('HomeController', function($scope, $rootScope, $http, $routeParams, config) {  

    $(function() {

		// parallax effect

		var mainOffset = 130;

        var sectionSalmonDetails = $('section#home-salmon-details');
        var sectionSalmonDetailsHeight;
        var sectionSalmonDetailsOffset;

        var parallaxInitilized = false;

        function initParallax()
        {
        	parallaxInitilized = true;

        	sectionSalmonDetails.css('transform', 'none');
        	sectionSalmonDetailsOffset = sectionSalmonDetails.offset().top;
        	sectionSalmonDetailsHeight = sectionSalmonDetails.height();
        }

	    function onScrollHandler()
        {
 			var scrollTop = $(this).scrollTop();

			if (!parallaxInitilized) {
				initParallax();
			}

			sectionSalmonDetails.css('transform', 'translateY(calc(' + (scrollTop - sectionSalmonDetailsOffset - sectionSalmonDetailsHeight * 0.5) / 1.15 + 'px + 50vh))');
        }


		$(window).off('scroll').on('scroll', onScrollHandler);



		// on window resize

		function onWindowResize() 
        {
        	parallaxInitilized = false;
        }
        $(window).resize(onWindowResize);

    });



});