sehaApp.controller('PinboardsCtrl',
		['$scope', 'Data', 'CONSTS', '$location', '$ionicLoading',
    function($scope, Data, CONSTS, $location, $ionicLoading) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.pinboards = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        Data.get('pinboards').then(function(result) {
            $scope.pinboards = (result.code == 200) ? _(result.data).toArray() : null;
            $ionicLoading.hide();
        });

        $scope.loadData = function() {

            var start = $scope.pinboards.length;

            Data.get('pinboards?start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadedPinboards = _(result.data).toArray();
                    $scope.pinboards = _.union($scope.pinboards, loadedPinboards);
                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        $scope.call = function(tel) {
            window.open('tel:' + tel.trim(), '_system');
        };

        $scope.locate = function(lat, lng) {
            window.open("https://maps.google.com?saddr=Current%20Location&daddr=" + lat + "," + lng, "_system");
        };

        $scope.getOffer = function(userID, offerID) {
            $location.path('/app/appointment/' + userID + '/' + offerID);
        };

        $scope.share = function(title, description, image) {

        };

    }
]);

sehaApp.controller('PinboardDetailsCtrl',
		['$scope', 'Data', 'CONSTS', '$stateParams', '$ionicLoading', '$location',
    function($scope, Data, CONSTS, $stateParams, $ionicLoading, $location) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.pinboard = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        //Load News
        Data.get('pinboard_detials?id=' + $stateParams.id).then(function(result) {
            $scope.pinboard = (result.code == 200) ? result.data : null;
            $ionicLoading.hide();
        });

        $scope.call = function(tel) {
            window.open('tel:' + tel.trim(), '_system');
        };

        $scope.locate = function(lat, lng) {
            window.open("https://maps.google.com?saddr=Current%20Location&daddr=" + lat + "," + lng, "_system");
        };

        $scope.getOffer = function(userID, offerID) {
            $location.path('/app/appointment/' + userID + '/' + offerID);
        };

        $scope.share = function(title, description, image) {

        };

}]);
