sehaApp.controller('HomeCtrl',
		['$scope', 'CONSTS', 'Data', '$state', '$ionicModal', '$ionicLoading', '$location', '$localStorage', '$translate', '$rootScope', 'NgMap','$geolocation',
    function($scope, CONSTS, Data, $state, $ionicModal, $ionicLoading, $location, $localStorage, $translate, $rootScope, NgMap, $geolocation) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $localStorage.lastNotification = (typeof $localStorage.lastNotification != 'undefined' || $localStorage.lastNotification != null) ? $localStorage.lastNotification : 0;

        //Initialize scope variables
        $scope.users = [];
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.citySuggest = [];
        $scope.typing = false;
        $scope.department = [];
        $scope.curr_lat = 0;
        $scope.curr_long = 0;
        $scope.popUser = null;

        $scope.user = {
            'location': '',
            'service': '',
            'service_id': 0
        };

        requestLocation();

        function requestLocation() {
						$ionicLoading.hide();
            getGeoLocationByPermission(function(position) {

                $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.latitude + "%2C" + position.longitude + "&language=en", function(data) {

                    var locationGeoCode = parsePlace(data.results[0].address_components);
                    $scope.user.location = locationGeoCode.state;
                });

                Data.get('nearby_subscribers?lat=' + position.latitude + '&lng=' + position.longitude).then(function(result) {
                    var users = $scope.users = (result.code == 200) ? _(result.data).toArray() : null;
                    $scope.curr_lat = position.latitude;
                    $scope.curr_long = position.longitude;
                    $ionicLoading.hide();

                    $scope.dynMarkers = [];

                    NgMap.getMap().then(function(map) {

                        var bounds = new google.maps.LatLngBounds();
                        for (var k in users) {
                            var cm = users[k];
                            $scope.dynMarkers.push(cm);
                            bounds.extend(cm.getPosition());
                        };

                        $scope.markerClusterer = new MarkerClusterer(map, $scope.dynMarkers, {});
                        map.setCenter(bounds.getCenter());
                        map.fitBounds(bounds);

                    });

                });

            });

        }

        function getGeoLocationByPermission(cb) {

						 $geolocation.getCurrentPosition({
		            timeout: 60000
		         }).then(function(position) {
							 cb({ 'latitude': position.coords.latitude, 'longitude': position.coords.longitude });
		         });

        };

        $scope.showProfile = function(userID) {
            Data.updateViewCnt(userID).then(function(result) {
                $location.path('/app/profile/' + userID);
            });
        };

        $scope.popUserInfo = function(event, userID, userData) {
            $scope.popUser = null;

            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

            Data.get('profile?id=' + userID + '&lat=' + $scope.curr_lat + '&lng=' + $scope.curr_long).then(function(result) {

                $scope.popUser = (result.code == 200) ? result.data : null;
                $ionicLoading.hide();

            });

            $scope.popUsrAdData = userData;

        };

        //Load departments
        Data.get('departments_all').then(function(result) {
            $scope.department = (result.code == 200) ? _(result.data).toArray() : null;
        });

        $scope.showProfile = function(userID) {
            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

            Data.updateViewCnt(userID).then(function(result) {
                $location.path('/app/profile/' + userID);
            });
        };

        $ionicModal.fromTemplateUrl('templates/modals/services.html', {
            scope: $scope,
            animation: 'slide-in-up'
        }).then(function(modal) {
            $scope.modal = modal;
        });

        $scope.showServices = function() {
            $scope.modal.show();
        };

        $scope.closeModal = function() {
            $scope.modal.hide();
        };

        // Cleanup the modal when we're done with it!
        $scope.$on('$destroy', function() {
            $scope.modal.remove();
        });

        $scope.getService = function(id, service) {
            $scope.user.service = service;
            $scope.user.service_id = id;
            $scope.modal.hide();

            $location.path('/app/search').search({
                catID: id,
                location: $scope.user.location,
                q: ''
            });
        };

        $scope.getDept = function(id) {
            $location.path('/app/search').search({
                catID: '',
                location: $scope.user.location,
                q: '',
                deptID: id
            });
            $scope.modal.hide();
        };

        $localStorage.lang = (typeof $localStorage.lang != 'undefined' && $localStorage.lang != null) ? $localStorage.lang : 'English';
        $translate.use($localStorage.lang);

        Data.get('city_suggest').then(function(result) {
            $scope.citySuggest = (result.code == 200) ? _(result.data).toArray() : null;
        });

        $scope.choseLocation = function(city) {
            $scope.user.location = city;
            $scope.typing = false;
        };

        $scope.spinIcon = function() {
            $(document).find('#location_spin_i').removeClass('focusSpinOut').addClass('focusSpin');
        };

        $scope.spinIconOut = function() {
            $(document).find('#location_spin_i').removeClass('focusSpin').addClass('focusSpinOut');
        };

        $scope.closePopup = function() {
            $scope.popUser = null;
        };

        function parsePlace(place) {
            var location = [];

            for (var ac = 0; ac < place.length; ac++) {
                var component = place[ac];

                switch (component.types[0]) {
                    case 'locality':
                        location['city'] = component.long_name;
                        break;
                    case 'administrative_area_level_1':
                        location['state'] = component.long_name;
                        break;
                    case 'country':
                        location['country'] = component.long_name;
                        break;
                }
            };

            return location;
        }

}]);
