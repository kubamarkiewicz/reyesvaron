var ParallaxService = angular.module('ParallaxService', [])
.service('ParallaxService', function ($rootScope) 
{

    this.parallaxRate = 1.15;

    this.elements = [];

    this.initilized = false;

    this.add = function(element, background) 
    {
        this.elements.push({
            element     : element,
            height      : undefined,
            offset      : undefined,
            background  : background === undefined ? false : background
        });

        var ParallaxService = this;


        // on scroll

        $(window).off('scroll').on('scroll', function(){

            var scrollTop = $(this).scrollTop();

            if (!ParallaxService.initilized) {
                ParallaxService.init();
            }

            for (i in ParallaxService.elements) {
                var element = ParallaxService.elements[i];
                var translate = 'calc(' + (scrollTop - element['offset'] - element['height'] * 0.5) / ParallaxService.parallaxRate + 'px + 50vh)';
                if (element['background']) {  // move background
                    element['element'].css('background-position', 'center ' + translate);
                }
                else {      // move whole element
                    element['element'].css('transform', 'translateY(' + translate + ')');
                }
            }
            
        });


        // on window resize

        function onWindowResize() 
        {
            setTimeout(function(){
                ParallaxService.initilized = false;
            }, 500);
        }
        $(window).resize(onWindowResize);

        setTimeout(function(){
            ParallaxService.initilized = false;
        }, 500);

    };

    this.init = function()
    {
        this.initilized = true;

        for (i in this.elements) {
            this.elements[i]['element'].css('transform', 'none');
            this.elements[i]['offset'] = this.elements[i]['element'].offset().top;
            this.elements[i]['height'] = this.elements[i]['element'].height();
        }
    }


});