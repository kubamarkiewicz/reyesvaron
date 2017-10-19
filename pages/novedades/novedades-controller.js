app.controller('NovedadesController', function($scope, $rootScope, $http, $routeParams, config) {  

    $scope.newsData = null;
    
    $scope.loadNewsData = function()
    {
        $http({
            method  : 'GET',
            // url     : config.api.urls.getNews + '/' + $rootScope.locale + '/news'
            url     : config.api.urls.getNews
        })
        .then(function(response) {
            $scope.newsData = response.data;
        });
    }
    $scope.loadNewsData();

});