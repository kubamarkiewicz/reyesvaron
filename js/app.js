
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

    // try to find out preferred language by yourself
    // $translateProvider.determinePreferredLanguage();

    // choose language form local storage or default

    if (!window.localStorage.locale) {
        window.localStorage.locale = config.defaultLanguage;
    }
    $translateProvider.preferredLanguage(window.localStorage.locale);

    // load default language Synchronously
    $.get({
        url: config.api.getTranslations,
        data: ['lang', window.localStorage.locale],
        async: false,
        contentType: "application/json",
        dataType: 'json',
        success: function (json) {
            $translateProvider.translations(window.localStorage.locale, json);
        }
    });
    
    $translateProvider.useUrlLoader(config.api.urls.getTranslations);
    $translateProvider.useSanitizeValueStrategy(null);
    // tell angular-translate to use your custom handler
    $translateProvider.useMissingTranslationHandler('missingTranslationHandlerFactory');
}]);

// define missing Translation Handler
app.factory('missingTranslationHandlerFactory', function () {
    var called = [];
    return function (translationID) {
        // use last element from code as default translation
        var translation = translationID.substr(translationID.lastIndexOf(".") + 1);

        var element = $("[translate='" + translationID + "']");
        if (element && element.html()) {
            translation = element.html();
        }
        
        if (!called[translationID]) {
            // call API
            $.post({
                url     : config.api.missingTranslation,
                data    : {
                    code : translationID,
                    type : element.attr('translate-type'),
                    translation : translation
                }
            });
        }
        
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
        .when('/novedades', { 
            controller: 'NovedadesController', 
            templateUrl: 'pages/novedades/index.html' 
        })        
        .when('/productos', { 
            controller: 'ProductosController', 
            templateUrl: 'pages/productos/index.html' 
        })         
        .when('/recetas', { 
            controller: 'RecetasController', 
            templateUrl: 'pages/recetas/index.html' 
        })     
        .when('/contacto', { 
            controller: 'ContactoController', 
            templateUrl: 'pages/contacto/index.html' 
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


app.run(function($rootScope, $sce, $http, $location, $translate, $window, $route) {

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

        $rootScope.setMetadata();

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


    // choose language
    $rootScope.setLanguage = function(language)
    {
        // save laguange chioce in local storage
        $rootScope.language = $window.localStorage.language = language;
        $translate.use(language);
        $('html').attr('lang', language);
        $('body > header nav span.lang a').removeClass('selected');
        $('body > header nav span.lang a[data-language=' + language + ']').addClass('selected');
    }
    $rootScope.setLanguage($window.localStorage.language);



    // language menu
    $('body > header nav span.lang a').click(function(){
        $rootScope.setLanguage($(this).data('language'));
        // location.reload();
        $route.reload();
        $rootScope.loadProductsData();
        $rootScope.loadPagesData();
        $rootScope.setMetadata();
    });




    // load products
    $rootScope.productsData = null;
    $rootScope.loadProductsData = function() 
    {
        $http({
            method  : 'GET',
            url     : config.api.urls.getProducts,
            params  : {
                'lang': $rootScope.language
            }
        })
        .then(function(response) {
            $rootScope.productsData = response.data;
        });
    }
    $rootScope.loadProductsData();






    // load pages data
    $rootScope.pagesData = [];
    $rootScope.loadPagesData = function()
    {
        $http({
            method  : 'GET',
            url     : config.api.urls.getPages,
            params  : {
                'lang': $rootScope.language
            }
        })
        .then(function(response) {
            $rootScope.pagesData = response.data;
            $rootScope.setMetadata();
        });
    }
    $rootScope.loadPagesData();



    // set meta data
    $rootScope.setMetadata = function()
    {
        var pageSlug = $rootScope.pageSlug;
        if (pageSlug == 'home') {
            pageSlug = '';
        }
        var page = $rootScope.pagesData[pageSlug];

        if (page) {
            document.title = page.meta_title;
            document.querySelector('meta[name=description]').setAttribute('content', page.meta_description);
        }
    }






});


    



