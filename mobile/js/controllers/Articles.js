sehaApp.controller('ArticlesCtrl',
		['$scope', 'Data', 'CONSTS', '$ionicLoading',
    function($scope, Data, CONSTS, $ionicLoading) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.articles = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        //Load News
        Data.get('articles').then(function(result) {
            $scope.articles = (result.code == 200) ? _(result.data).toArray() : null;
            $ionicLoading.hide();
        });

        $scope.LoadData = function() {

            var start = $scope.articles.length;

            Data.get('articles' + dataUrl + '&start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadArticles = _(result.data).toArray();
                    $scope.articles = _.union($scope.articles, loadArticles);
                    $scope.moreData = false;
                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        $scope.share = function(title, description, image) {

        };

}]);

sehaApp.controller('ArticleDetailsCtrl',
		['$scope', 'Data', 'CONSTS', '$stateParams', '$ionicLoading',
		function($scope, Data, CONSTS, $stateParams, $ionicLoading) {

    $ionicLoading.show({
        template: '<div class="hg-loader"></div>',
        noBackdrop: true
    });

    $scope.article = [];
    $scope.ads = [];
    $scope.baseUrl = CONSTS.BASE_URL;

    //Load News
    Data.get('article_details?id=' + $stateParams.id).then(function(result) {
        $scope.article = (result.code == 200) ? result.data : null;
        $ionicLoading.hide();
    });

    $scope.share = function(title, description, image) {

    };

}]);
