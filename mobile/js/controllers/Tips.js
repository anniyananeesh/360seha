sehaApp.controller('TipsCtrl',
		['$scope', 'Data', 'CONSTS', '$ionicLoading', '$timeout',
    function($scope, Data, CONSTS, $ionicLoading, $timeout) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.tips = [];
        $scope.ads = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        //Load tips
        Data.get('tips').then(function(result) {
            $scope.tips = (result.code == 200) ? _(result.data).toArray() : null;
            $ionicLoading.hide();
        });

        //Load the advertisements for mobile device
        Data.get('mobile_ads').then(function(result) {
            $scope.ads = (result.code == 200) ? _(result.data).toArray() : null;
        });

        var adIndex = -1;

        $scope.getAdBanner = function() {
            adIndex = ++adIndex;
            return ($scope.ads[adIndex] && typeof $scope.ads[adIndex] !== 'undefined') ? $scope.ads[adIndex] : false;
        };

        $scope.LoadData = function() {

            var start = $scope.tips.length;

            Data.get('tips?start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadTips = _(result.data).toArray();
                    $scope.tips = _.union($scope.tips, loadTips);
                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        $scope.share = function(title, description, image) {

        };

        $scope.shareAd = function(title, image) {

        };

    }
]);

sehaApp.controller('TipsDetailsCtrl',
		['$scope', 'Data', 'CONSTS', '$stateParams', '$ionicLoading',
    function($scope, Data, CONSTS, $stateParams, $ionicLoading) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.tips = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        //Load tips details
        Data.get('tips_details?id=' + $stateParams.id).then(function(result) {
            $scope.tips = (result.code == 200) ? result.data : null;
            $ionicLoading.hide();
        });

        $scope.share = function(title, description, image) {

        };

}]);
