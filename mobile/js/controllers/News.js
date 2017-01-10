sehaApp.controller('NewsCtrl', ['$scope', 'Data', 'CONSTS', '$ionicLoading', '$rootScope',
    function($scope, Data, CONSTS, $ionicLoading, $rootScope) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.news = [];
        $scope.ads = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        //Load News
        Data.get('news').then(function(result) {
            $scope.news = (result.code == 200) ? _(result.data).toArray() : null;
            $ionicLoading.hide();
        });

        $scope.LoadData = function() {
            var start = $scope.news.length;

            Data.get('news?start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadNews = _(result.data).toArray();
                    $scope.news = _.union($scope.news, loadNews);
                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        //Load the advertisements for mobile device
        Data.get('mobile_ads').then(function(result) {
            $scope.ads = (result.code == 200) ? _(result.data).toArray() : null;
        });

        var adIndex = -1;

        $scope.getAdBanner = function() {
            adIndex = ++adIndex;
            return ($scope.ads[adIndex] && typeof $scope.ads[adIndex] !== 'undefined') ? $scope.ads[adIndex] : false;
        };

        $scope.goUrl = function(url) {
            window.open(url, '_system');
        };

        $scope.share = function(title, description, image) {
						
            /**
						$cordovaSocialSharing
			  		.share( title, description, $scope.baseUrl + 'uploads/news/' + image, 'https://play.google.com/store/apps/details?id=com.dgweb.seha')
			  		.then(function(result) {

			  		}, function(err) {
			  			$cordovaToast.showShortBottom(err);
			  		});
						*/

        };

        $scope.shareAd = function(title, image) {
            /**
						 $cordovaSocialSharing
						 .share( title, null, $scope.baseUrl + 'uploads/ads/' + image, 'https://play.google.com/store/apps/details?id=com.dgweb.seha')
						 .then(function(result) {

						 }, function(err) {
							 $cordovaToast.showShortBottom(err);
						 });
					 */
        };

}]);

sehaApp.controller('NewsDetailsCtrl',
		['$scope', 'Data', 'CONSTS', '$stateParams', '$ionicLoading',
		function($scope, Data, CONSTS, $stateParams, $ionicLoading) {

    $ionicLoading.show({
        template: '<div class="hg-loader"></div>',
        noBackdrop: true
    });

    $scope.news = [];
    $scope.ads = [];
    $scope.baseUrl = CONSTS.BASE_URL;

    //Load News
    Data.get('news_details?id=' + $stateParams.id).then(function(result) {
        $scope.news = (result.code == 200) ? result.data : null;
        $ionicLoading.hide();
    });

    $scope.share = function(title, description, image) {

        /**
				$cordovaSocialSharing
            .share(title, description, $scope.baseUrl + 'uploads/news/' + image, 'https://play.google.com/store/apps/details?id=com.dgweb.seha')
            .then(function(result) {

            }, function(err) {
                $cordovaToast.showShortBottom(err);
            });
				*/

    };

}]);
