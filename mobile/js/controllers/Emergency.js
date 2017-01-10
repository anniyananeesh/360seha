sehaApp.controller('EmergencyCtrl',
		['$scope', 'CONSTS', 'Data', '$state', '$ionicLoading', '$rootScope', '$location','$geolocation',
    function($scope, CONSTS, Data, $state, $ionicLoading, $rootScope, $location, $geolocation) {

        //Initializa scope variables
        $scope.users = [];
        $scope.view = 'list';
        $scope.markers = new Array();
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.curr_lat = 0;
        $scope.curr_long = 0;


        //$scope.moreData = true;
        var dataUrl = '';

        $scope.call = function(tel) {
            window.open('tel:' + tel.trim(), '_system');
        };

        $scope.locate = function(lat, lng) {
            window.open("https://maps.google.com?saddr=Current%20Location&daddr=" + lat + "," + lng, "_system");
        };

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

				requestLocation();

        function requestLocation() {

						$geolocation.getCurrentPosition({
								timeout: 60000
						}).then(function(position) {

								dataUrl += '?lat=' + position.coords.latitude + '&lng=' + position.coords.longitude;

                $scope.curr_lat = lat = position.coords.latitude;
                $scope.curr_long = lng = position.coords.longitude;

                //Load the initialize users
                getUsers(dataUrl);
								
						});

        }

        function getUsers(paramsUrl) {
            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

            Data.get('emergency' + paramsUrl).then(function(result) {
                $scope.users = (result.code == 200) ? _(result.data).toArray() : null;
                $ionicLoading.hide();
            });
        };

        $scope.loadData = function() {

            var start = $scope.users.length;

            Data.get('emergency' + dataUrl + '&start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadUsers = _(result.data).toArray();
                    $scope.users = _.union($scope.users, loadUsers);
                    $scope.moreData = false;
                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        $scope.emergencyCall = function() {
            window.open('tel:999', '_system');
        };

        $scope.changeView = function(view) {
            $scope.view = view;
        };

        $scope.popUserInfo = function(event, userID) {

            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

						$geolocation.getCurrentPosition({
								timeout: 60000
						}).then(function(position) {
								popUser(position.coords.latitude, position.coords.longitude, userID);
						});

        };

        function popUser(lat, lng, userID) {

            Data.get('profile?id=' + userID + '&lat=' + lat + '&lng=' + lng).then(function(result) {

                $scope.popUser = (result.code == 200) ? result.data : null;
                $ionicLoading.hide();
            });
        }

        $scope.closePopup = function() {
            $scope.popUser = null;
        };

        $scope.showProfile = function(userID) {
            Data.updateViewCnt(userID).then(function(result) {
                $location.path('/app/profile/' + userID);
            });
        };

}]);
