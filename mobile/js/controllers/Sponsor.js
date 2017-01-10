sehaApp.controller('SponsorCtrl',
		['$scope', 'CONSTS', 'Data', '$state', '$ionicLoading', '$window',
    function($scope, CONSTS, Data, $state, $ionicLoading, $window) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.sponsorBanner = false;
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.showAd = true;

        Data.get('sponsor_banner').then(function(result) {
            $scope.sponsorBanner = (result.code == 200) ? result.data : false;
            $ionicLoading.hide();
        });

        $scope.goUrl = function(url) {
            $window.open(url, '_system');
        };

        $scope.closeSponsorAd = function() {
            $scope.showAd = false;
        };

}]);
