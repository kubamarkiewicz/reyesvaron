app.controller('RecetasController', function($scope, $rootScope, $http, $routeParams, config, ParallaxService) {  

    $scope.recetasData = null;
    
    $scope.loadRecetasData = function()
    {
        $http({
            method  : 'GET',
            url     : config.api.urls.getRecetas
        })
        .then(function(response) {
            $scope.recetasData = response.data;
        });
    }
    $scope.loadRecetasData();


    ParallaxService.add($('section#recetas-header'), true);


});