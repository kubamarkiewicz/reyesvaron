
var app = angular.module("myApp", [
    "ngRoute",
    "ngSanitize",
    'pascalprecht.translate',
    'ParallaxService'
    // 'angular-parallax'
]);

// load configuration from files
app.constant('config', window.config);




// translations

app.config(['$translateProvider', function ($translateProvider) {

    $.get({
        // url: 'cms/api/es/translations',
        url: 'dummy-api/es/translations.json',
        async: false,
        contentType: "application/json",
        dataType: 'json',
        success: function (json) {
            $translateProvider.translations('es', json);
        }
    });
    
    $translateProvider.useStaticFilesLoader({
        // prefix: 'cms/api/',
        // suffix: '/translations'
        prefix: 'dummy-api/',
        suffix: '/translations.json'
    });
    $translateProvider.preferredLanguage('es');
    $translateProvider.useSanitizeValueStrategy(null);
    // tell angular-translate to use your custom handler
    $translateProvider.useMissingTranslationHandler('myCustomHandlerFactory');
}]);

// define custom handler
app.factory('myCustomHandlerFactory', function () {
    var called = [];
    return function (translationID) {
        // use last element from code as default translation
        var translation = translationID.substr(translationID.lastIndexOf(".") + 1);

        var element = $("[translate='" + translationID + "']");
        if (element && element.html()) {
            translation = element.html();
        }
        
/*        if (!called[translationID]) {
            // call API
            $.post({
                url     : 'cms/api/es/translations',
                data    : {
                    code : translationID,
                    type : element.attr('translate-type'),
                    translation : translation
                }
            });
        }*/
        
        called[translationID] = true;

        return translation;
    };
});



// ROUTING ===============================================
app.config(function ($routeProvider, $locationProvider) { 
    
    $routeProvider 

        .when('/', { 
            controller: 'HomeController', 
            templateUrl: 'pages/home/index.html' 
        })   
        .when('/empresa', { 
            controller: 'EmpresaController', 
            templateUrl: 'pages/empresa/index.html' 
        })     
        .when('/contacto', { 
            controller: 'ContactoController', 
            templateUrl: 'pages/contacto/index.html' 
        })        
        .when('/novedades', { 
            controller: 'NovedadesController', 
            templateUrl: 'pages/novedades/index.html' 
        })        
        .when('/productos', { 
            controller: 'ProductosController', 
            templateUrl: 'pages/productos/index.html' 
        })    
        .otherwise({ 
            redirectTo: '/' 
        }); 

    // remove hashbang
    $locationProvider.html5Mode(true);
});

// CORS fix
app.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.useXDomain = true;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
    }
]);


app.run(function($rootScope, $sce, $http, $location) {

    $("body").removeClass('loading');

    $rootScope.$on('$routeChangeStart', function (event, next, prev) 
    {
        // find page slug
        var prevSlug = $rootScope.pageSlug = 'home';
        if (next.originalPath && next.originalPath.substring(1)) {
            $rootScope.pageSlug = next.originalPath.substring(1);
            // substring until first slash
            if ($rootScope.pageSlug.indexOf('/') != -1) {
                $rootScope.pageSlug = $rootScope.pageSlug.substr(0, $rootScope.pageSlug.indexOf('/'));
            }
        }

        // set body class as "page-slug"
        $("body")
        .removeClass(function (index, className) {
            return (className.match (/(^|\s)page-\S+/g) || []).join(' ');
        })
        .addClass("page-"+$rootScope.pageSlug);

    });

    $rootScope.$on('$routeChangeSuccess', function() {

    });


    // fix for displaying html from model field
    $rootScope.trustAsHtml = function(string) {
        return $sce.trustAsHtml(string);
    };


    $(function() {

        // hamburger menu
        $('#hamburger').click(function(){
            $('body > header nav').toggleClass('expanded');
        });
        $('body > header nav a').click(function(){
            $('body > header nav').removeClass('expanded');
        });


        function onWindowResize() 
        {
            $rootScope.windowHeight = $(window).height();
        }
        onWindowResize();
        $(window).resize(onWindowResize);

    });

    $rootScope.closeMenu = function()
    {
        $('body > header nav').removeClass('expanded');
    }



    // load products
    $rootScope.productsData = null;
    
    $http({
        method  : 'GET',
        url     : config.api.urls.getProducts
    })
    .then(function(response) {
        $rootScope.productsData = response.data;
    });



});


    



