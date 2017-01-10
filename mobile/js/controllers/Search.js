sehaApp.controller('SearchCtrl',
		['$scope', 'Data', '$state', '$localStorage', '$stateParams', 'CONSTS', '$location', 'Auth', '$ionicLoading', '$ionicModal', '$rootScope','$geolocation',
    function($scope, Data, $state, $localStorage, $stateParams, CONSTS, $location, Auth, $ionicLoading, $ionicModal, $rootScope,$geolocation) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        //Initialize the cope variables
        $scope.users = [];
        $scope.insurance = [];
        $scope.city = [];
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.view = 'list';
        $scope.popUser = null;
        var dataUrl = '';
        $scope.curr_lat = 0;
        $scope.curr_long = 0;
        var lat = 0,
            lng = 0;
        $scope.offers = [];
        $scope.showOfferPopup = false;

        var params = {
            'catId': $location.search().catID,
            'location': $location.search().location,
            'q': $location.search().q,
            'deptId': $location.search().deptID
        };

        $scope.userFilter = {
            'city': '',
            'ins': '',
            'he': '0'
        };

        requestLocation();

        function requestLocation() {

						$geolocation.getCurrentPosition({
							 timeout: 60000
						}).then(function(position) {

								dataUrl = '?catId=' + params.catId + '&lat=' + position.coords.latitude + '&lng=' + position.coords.longitude + '&ins=&city=&q=' + params.q + '&lqry=' + params.location + '&deptId=' + params.deptId;

								loadOffers({
										'dept': params.deptId,
										'lat': position.coords.latitude,
										'lng': position.coords.longitude
								}, function(offers) {

										$scope.offers = offers;
										$scope.showOfferPopup = (offers) ? true : false;
										//Load the initialize users
										getUsers(dataUrl);

								});

								$scope.curr_lat = lat = position.coords.latitude;
								$scope.curr_long = lng = position.coords.longitude;

						});

        }

        $scope.closePopup = function() {
            $scope.showOfferPopup = false;
        };

        function loadOffers(params, cb) {
            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

            Data.get('offers_popup?dept=' + params.dept + '&lat=' + params.lat + '&lng=' + params.lng).then(function(result) {
                cb((result.code == 200) ? _(result.data).toArray() : null);
                $ionicLoading.hide();
            });
        }

        function getUsers(dataUrl) {
            Data.get('find' + dataUrl).then(function(result) {
                $scope.users = (result.code == 200) ? _(result.data).toArray() : null;

                $scope.curr_lat = lat = (result.code == 200) ? $scope.users[0].latitude : null;
                $scope.curr_long = lng = (result.code == 200) ? $scope.users[0].longitude : null;
            });
        };

        $scope.loadData = function() {

            var start = $scope.users.length;

            Data.get('find' + dataUrl + '&start=' + start).then(function(result) {

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

        $scope.showProfile = function(userID) {
            Data.updateViewCnt(userID).then(function(result) {
                $location.path('/app/profile/' + userID);
            });
        };

        $scope.navActivity = function(lat, lng) {
            window.open("https://maps.google.com?saddr=Current%20Location&daddr=" + lat + "," + lng, "_system");
        };

        $scope.makeAppointment = function(userID, offerID) {
            $location.path('/app/appointment/' + userID + '/' + offerID);
        };

        $ionicModal.fromTemplateUrl('templates/modals/filter.html', {
            scope: $scope,
            animation: 'slide-in-up'
        }).then(function(modal) {
            $scope.modal = modal;
        });

        $scope.showFilter = function() {
            $scope.modal.show();
        };

        $scope.closeModal = function() {
            $scope.modal.hide();
        };

        // Cleanup the modal when we're done with it!
        $scope.$on('$destroy', function() {
            $scope.modal.remove();
        });

        // Execute action on hide modal
        $scope.$on('modal.hidden', function() {
            // Execute action
        });

        // Execute action on remove modal
        $scope.$on('modal.removed', function() {
            // Execute action
        });

        //Load all insurance companies
        Data.get('insurance').then(function(result) {
            $scope.insurance = (result.code == 200) ? _(result.data).toArray() : null;
        });

        //Load all cities . Check for country if not load all cities
        Data.get('city').then(function(result) {
            $scope.city = (result.code == 200) ? _(result.data).toArray() : null;
        });

        $scope.submitSearch = function() {
            $scope.modal.hide();

            var dataUrl = '?catId=' + $location.search().catID + '&lat=&lng=&ins=' + $scope.userFilter.ins + '&city=' + $scope.userFilter.city + '&q=' + params.q + '&deptId=' + params.deptId;

            //Load the initialize users
            getUsers(dataUrl);

        };

        $scope.changeView = function(view) {
            $scope.view = view;
        };

        function popUser(lat, lng, userID) {
            Data.get('profile?id=' + userID + '&lat=' + lat + '&lng=' + lng).then(function(result) {

                $scope.popUser = (result.code == 200) ? result.data : null;
                $ionicLoading.hide();

            });
        }

        $scope.popUserInfo = function(event, userID, userData) {

            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

						$geolocation.getCurrentPosition({
							  timeout: 60000
						}).then(function(position) {
								popUser(position.coords.latitude, position.coords.longitude, userID);
						});

            $scope.popUsrAdData = userData;

        };

        $scope.closePopupInfo = function() {
            $scope.popUser = null;
        };

        $scope.callOffer = function(phone) {
            window.open("tel:" + phone, '_system');
        };

        $scope.getOffer = function(userID, offerID) {
            $location.path('/app/appointment/' + userID + '/' + offerID);
        };

        $scope.showOffer = function(offerID) {
            $location.path('/app/pinboard_details/' + offerID);
        };

}]);
