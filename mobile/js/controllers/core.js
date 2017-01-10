sehaApp.controller('AboutCtrl', ['$scope', 'Data', '$ionicLoading', function($scope, Data, $ionicLoading) {

    $ionicLoading.show({
        template: '<div class="hg-loader"></div>',
        noBackdrop: true
    });

    $scope.content = null;

    $scope.$on('$ionicView.loaded', function(event) {
        $ionicLoading.hide();
    });

}]);

sehaApp.controller('AdvertiseCtrl',
		['$scope', '$window', '$state', 'Data', '$ionicLoading', '$translate',
    function($scope, $window, $state, Data, $ionicLoading, $translate) {

        //Initialize the scope variables
        $scope.user = {
            name: '',
            company_name: '',
            phone: '',
            email: '',
            message: ''
        };

        $translate(['advertise_text']).then(function(translations) {
            $scope.user.message = translations.advertise_text;
        });

        //Submit the user registration form
        $scope.sendRequest = function(valid) {
            if (valid) {
                $ionicLoading.show({
                    template: '<div class="hg-loader"></div> <br/>Sending Request...',
                    noBackdrop: true
                });

                var params = {
                    name: $scope.user.name,
                    company_name: $scope.user.company_name,
                    phone: $scope.user.phone,
                    email: $scope.user.email,
                    message: $scope.user.message
                };

                Data.post('advertise', params).then(function(result) {

                    $ionicLoading.hide();

                    if (result.code == 200) {

                        $translate(['success']).then(function(translations) {
														$window.alert(translations.success);
                        });

                        $scope.user = {
                            name: '',
                            company_name: '',
                            phone: '',
                            email: '',
                            message: 'Hi, we want to get listed with 360Seha.'
                        };
                    } else {
                        $translate(['unknown_error']).then(function(translations) {
                            $window.alert(translations.unknown_error);
                        });
                    }

                });

            }

        }

}]);

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

sehaApp.controller('AsyncSearchCtrl',
		['$scope', 'CONSTS', 'Data', '$ionicModal', '$ionicPopup', '$localStorage', '$timeout', '$state', '$http', '$ionicScrollDelegate',
    function($scope, CONSTS, Data, $ionicModal, $ionicPopup, $localStorage, $timeout, $state, $http, $ionicScrollDelegate) {

        $scope.suggestions = [];
        $scope.showList = false;
        $scope.user = {
            qry: ''
        };

        Data.get('suggest').then(function(result) {
            $scope.suggestions = (result.code == 200) ? _(result.data).toArray() : false;
        });

        $scope.getSuggestions = function() {
            $scope.showList = ($scope.user.qry != "") ? true : false;
            $ionicScrollDelegate.$getByHandle('search-scroll').scrollTop(true);
        };

}]);

sehaApp.controller('CountryCtrl',
		['$scope', 'CONSTS', 'Data', '$ionicModal', '$ionicPopup', '$localStorage', '$timeout', '$state', '$ionicLoading', '$translate',
    function($scope, CONSTS, Data, $ionicModal, $ionicPopup, $localStorage, $timeout, $state, $ionicLoading, $translate) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        $scope.country = (typeof $localStorage.country != 'undefined' && $localStorage.country != null) ? $localStorage.country : null;
        $scope.countryEn = (typeof $localStorage.countryEn != 'undefined' && $localStorage.countryEn != null) ? $localStorage.countryEn : null;
        $scope.countryAr = (typeof $localStorage.countryAr != 'undefined' && $localStorage.countryAr != null) ? $localStorage.countryAr : null;
        $scope.baseUrl = CONSTS.BASE_URL;

        $localStorage.lang = (typeof $localStorage.lang != 'undefined' && $localStorage.lang != null) ? $localStorage.lang : 'English';
        $translate.use($localStorage.lang);

        //Load the coutries from database
        Data.get('country').then(function(result) {
            $scope.country = (result.code == 200) ? _(result.data).toArray() : null;
            $ionicLoading.hide();
        });

        $scope.chooseCountry = function(country) {
            $localStorage.country = country.id;
            $scope.countryEn = $localStorage.countryEn = country.name_en;
            $scope.countryAr = $localStorage.countryAr = country.name_ar;
            $state.go('app.home');
        };

        $scope.isChosen = function(country) {
            var countryStorage = (typeof $localStorage.country != 'undefined' && $localStorage.country != null) ? $localStorage.country : null;
            return (countryStorage == country);
        };

}]);

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

sehaApp.controller('FooterCtrl',
    ['$scope', '$state',
    function($scope, $state) {

    $scope.NavActivity = function(state) {
        $state.go(state);
    };

}]);

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

sehaApp.controller('ListedCtrl',
    ['$scope', '$state', 'Data', '$ionicLoading', '$translate', '$rootScope', '$ionicModal', '$ionicActionSheet', '$ionicScrollDelegate', '$q', 'CONSTS', '$timeout','$geolocation',
    function($scope, $state, Data, $ionicLoading, $translate, $rootScope, $ionicModal, $ionicActionSheet, $ionicScrollDelegate, $q, CONSTS, $timeout, $geolocation) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        //Initialize the scope variables
        $scope.user = {
            name_en: '',
            name_ar: '',
            category: '',
            email: '',
            contact_no: '',
            description_en: '',
            latitude: '',
            longitude: '',
            city: '',
            state: '',
            country: '',
            url: '',
            host: '',
            departments: []
        };

        $scope.department = [];
        $scope.categories = [];
        $scope.chosenItems = [];

        Data.get('parent_category').then(function(result) {
            $scope.categories = (result.code == 200) ? result.data : null;
            $ionicLoading.hide();
        });

        $scope.shareLocation = function() {
            $ionicLoading.show({
                template: '<div class="hg-loader"></div>',
                noBackdrop: true
            });

            getLocationPermissionByApi();

        };

        function getLocationPermissionByApi() {

            requestLocation(function(position) {

                $scope.user.latitude = position.latitude;
                $scope.user.longitude = position.longitude;

                var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.latitude + "," + position.longitude;

                $.getJSON(geocodingAPI, function(json) {
                    if (json.status == "OK") {
                        //Check result 0
                        var result = json.results[0];
                        //look for locality tag and administrative_area_level_1
                        var city = "",
                            state = "",
                            country = "";

                        for (var i = 0, len = result.address_components.length; i < len; i++) {
                            var ac = result.address_components[i];
                            if (ac.types.indexOf("administrative_area_level_1") >= 0) state = ac.long_name;
                            if (ac.types.indexOf("sublocality_level_1") >= 0) city = ac.long_name;
                            if (ac.types.indexOf("country") >= 0) country = ac.long_name;
                        }

                        if (state != '') {
                            $scope.user.city = city;
                            $scope.user.state = state;
                            $scope.user.country = country;
                        }

                        $ionicLoading.hide();

                    }

                });

            });

        }

        function requestLocation(cb) {

            $geolocation.getCurrentPosition({
               timeout: 60000
            }).then(function(position) {
              cb({ 'latitude': position.coords.latitude, 'longitude': position.coords.longitude });
            });

        };

        //Load departments
        Data.get('departments_all').then(function(result) {
            $scope.department = (result.code == 200) ? _(result.data).toArray() : null;
        });

        //Modal for choosing the departments for the user
        $ionicModal.fromTemplateUrl('templates/modals/departments.html', {
            scope: $scope,
            animation: 'slide-in-up'
        }).then(function(modal) {
            $scope.modal = modal;
        });

        $scope.showModal = function() {
            $scope.modal.show();
        };

        $scope.closeModal = function() {
            $scope.user.departments = [];
            $scope.chosenItems = _.where($scope.department, {
                'checked': true
            });
            _.each($scope.chosenItems, function(item) {
                $scope.user.departments.push(item.id);
            });

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

        $scope.sendRequest = function(form) {

            if (!form && ($scope.user.name_en == '' && $scope.user.name_ar == '')) {
                $translate(['failed_form_has_errors']).then(function(translations) {
                    //$cordovaToast.showShortBottom(translations.failed_form_has_errors);
                });
            } else {
                $ionicLoading.show({
                    template: '<div class="hg-loader"></div>',
                    noBackdrop: true
                });

                var hostParsed = parseURL($scope.user.url);
                $scope.user.host = hostParsed.host;

                Data.post('get_listed', $scope.user).then(function(result) {

                    $ionicLoading.hide();
                    if (result.code == 200) {
                        $translate(['your_request_has_send']).then(function(translations) {
                            //$cordovaToast.showLongBottom(translations.your_request_has_send);
                        });

                        $scope.user = {
                            name_en: '',
                            name_ar: '',
                            category: '',
                            email: '',
                            contact_no: '',
                            description_en: '',
                            latitude: '',
                            longitude: '',
                            city: '',
                            state: '',
                            country: '',
                            url: '',
                            host: '',
                            departments: []
                        };

                        $scope.chosenItems = 0;
                    } else {
                        $translate(['failed_to_submit_due_to_an_error']).then(function(translations) {
                            //$cordovaToast.showShortBottom(translations.failed_to_submit_due_to_an_error);
                        });
                    }
                });

            }

        };

        function parseURL(url) {

            parsed_url = {}

            if (url == null || url.length == 0)
                return parsed_url;

            protocol_i = url.indexOf('://');
            parsed_url.protocol = url.substr(0, protocol_i);

            remaining_url = url.substr(protocol_i + 3, url.length);
            domain_i = remaining_url.indexOf('/');
            domain_i = domain_i == -1 ? remaining_url.length - 1 : domain_i;
            parsed_url.domain = remaining_url.substr(0, domain_i);
            parsed_url.path = domain_i == -1 || domain_i + 1 == remaining_url.length ? null : remaining_url.substr(domain_i + 1, remaining_url.length);

            domain_parts = parsed_url.domain.split('.');
            switch (domain_parts.length) {
                case 2:
                    parsed_url.subdomain = null;
                    parsed_url.host = domain_parts[0];
                    parsed_url.tld = domain_parts[1];
                    break;
                case 3:
                    parsed_url.subdomain = domain_parts[0];
                    parsed_url.host = domain_parts[1];
                    parsed_url.tld = domain_parts[2];
                    break;
                case 4:
                    parsed_url.subdomain = domain_parts[0];
                    parsed_url.host = domain_parts[1];
                    parsed_url.tld = domain_parts[2] + '.' + domain_parts[3];
                    break;
            }

            parsed_url.parent_domain = parsed_url.host + '.' + parsed_url.tld;
            return parsed_url;

        }

}]);

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

sehaApp.controller('NotificationsCtrl',
    ['$scope', 'Data', '$ionicLoading', '$interval', '$localStorage', '$location', '$translate',
    function($scope, Data, $ionicLoading, $interval, $localStorage, $location, $translate) {

        $scope.notifications = [];
        $scope.count = 0;
        $scope.moredata = false;

        $scope.showNote = function(lang) {
            return ($localStorage.lang === lang);
        };

        Data.get('notifications').then(function(result) {
            if (!result.error) {
                $scope.notifications = result.data;
            } else {
                $ionicLoading.show({
                    template: result.data,
                    duration: 1000
                });
            }
        });

        $scope.loadMoreData = function() {

            var start = $scope.notifications.length;

            Data.get('notifications?start=' + start).then(function(result) {

                if (result.data.length > 0) {
                    for (i = 0; i < result.data.length; i++) {
                        $scope.notifications.push(result.data[i]);
                    }
                } else {
                    $scope.moredata = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });
        };

        $scope.doRefresh = function() {

            var elem = $('.notification_id').val();

            Data.get('latest_notifications?checkpoint=' + elem).then(function(result) {

                if (!result.error) {

                    for (i = 0; i < result.data.length; i++) {
                        $scope.notifications.push(result.data[i]);
                    }
                } else {

                    $translate(['no_notifications']).then(function(translations) {
                        $ionicLoading.show({
                            template: translations.no_notifications,
                            duration: 1000
                        });
                    });
                }
                $scope.$broadcast('scroll.refreshComplete');
            });

        };

        //Periodically check for any notifications
        $interval(function() {

            var elem = $localStorage.lastNotification;

            Data.get('all_latest_notifications?checkpoint=' + elem).then(function(result) {

                if (result.data.length > 0) {
                    $scope.count = result.data.length;
                    $(document).find('#badge-notify').html($scope.count);
                    $(document).find('#badge-notify').show();
                    $localStorage.lastNotification = result.data[0].job_id;
                    $scope.notifications = result.data;
                }

            });

        }, 15000);

        $scope.rstNotificationCnt = function() {
            $(document).find('#badge-notify').hide();
            $scope.count = 0;
        };

}]);

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

sehaApp.controller('ProfileCtrl',
		['$scope', 'Data', '$stateParams', 'CONSTS', '$state', '$location', 'Auth', '$localStorage', '$ionicLoading', '$ionicScrollDelegate', '$ionicPosition', '$timeout', '$translate', '$ionicSlideBoxDelegate', '$ionicModal',
    function($scope, Data, $stateParams, CONSTS, $state, $location, Auth, $localStorage, $ionicLoading, $ionicScrollDelegate, $ionicPosition, $timeout, $translate, $ionicSlideBoxDelegate, $ionicModal) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>',
            noBackdrop: true
        });

        //Initialize all scope variables here
        $scope.user = [];
        $scope.images = [];
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.view = 'map';
        $scope.markers = new Array();
        $scope.socialMedias = [];
        $scope.pinboards = [];
        $scope.departments = [];
        $scope.featured_user = null;
        $scope.loading_featured = true;

        $scope.ask = {
            'name': '',
            'email': '',
            'department': '',
            'message': '',
            'subscriber': $stateParams.id
        };

        $scope.goParent = function() {
            $state.go('app.home');
        };

        $scope.$on('$ionicView.beforeEnter', function(event) {

            //Load the basic details from database
            Data.get('profile?id=' + $stateParams.id).then(function(result) {

                $ionicLoading.hide();

                if (result.code == 200) {
                    $scope.user = result.data;

                    Data.get('social_medias?user=' + $stateParams.id).then(function(result) {
                        $scope.socialMedias = (result.code == 200) ? result.data : [];
                        $ionicLoading.hide();
                    });

                    Data.get('user_offers?id=' + $stateParams.id).then(function(result) {
                        $scope.pinboards = (result.code == 200) ? result.data : null;
                        $ionicLoading.hide();
                    });

                    Data.get('departments?id=' + $stateParams.id).then(function(result) {
                        $scope.departments = (result.code == 200) ? result.data : null;
                    });

                    if ($scope.user.is_featured == 1) {
                        //Load the image gallery from the database
                        Data.get('images?id=' + $stateParams.id).then(function(result) {
                            $scope.images = (result.code == 200) ? _(result.data).toArray() : false;
                            $ionicSlideBoxDelegate.update();
                        });

                        $scope.imageUrl = $scope.baseUrl + "uploads/gallery/photo";
                    } else {
                        //Call on load time
                        getFeaturedUser();
                    }

                }

            });

        });

        $scope.showProfile = function(id) {
            Data.updateViewCnt(id).then(function(result) {
                $location.path('/app/profile/' + id);
            });
        };

        function getFeaturedUser() {
            $scope.loading_featured = true;
            $scope.featured_user = null;

            //Random featured user
            Data.get('featured_user').then(function(result) {
                $scope.featured_user = (result.code == 200) ? result.data : false;
                $scope.loading_featured = false;
            });
        };

        $scope.goUrl = function(url) {
            var url = (url.indexOf('http://') != 0) ? 'http://' + url : url;
            window.open(url, '_system');
        };

        $scope.goSmUrl = function(url) {
            window.open(url, '_system');
        }

        $scope.getUsersByDept = function(dept) {
            $location.path('/app/search').search({
                catID: '',
                location: '',
                q: '',
                deptID: dept
            });
        };

        $scope.reviewActivity = function() {
            $location.path('/app/review/' + $stateParams.id);
        };

        $scope.share = function(title, description) {

        };

        $scope.call = function(tel) {
            window.open('tel:' + tel, '_system');
        };

        $scope.locate = function(event, lat, lng) {
            window.open("https://maps.google.com?saddr=Current%20Location&daddr=" + lat + "," + lng, "_system");
        };

        $scope.getOffers = function() {
            $location.path('/app/profile_offers/' + $stateParams.id);
        };

        $ionicModal.fromTemplateUrl('templates/modals/ask-doctor.html', {
            scope: $scope,
            animation: 'slide-in-up'
        }).then(function(modal) {
            $scope.modal = modal;
        });

        $scope.showModal = function() {
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

        $scope.sendMessage = function(valid) {

            if (valid) {

                $ionicLoading.show({
                    template: '<div class="hg-loader"></div>',
                    noBackdrop: true
                });

                Data.post('ask_doctor', $scope.ask).then(function(result) {

                    $ionicLoading.hide();

                    if (result.code == 200) {

                        $translate(['success_ask_doctor']).then(function(translations) {
                            //$cordovaToast.showLongBottom(translations.success_ask_doctor);
                        });

                        $scope.ask = {
                            'name': '',
                            'email': '',
                            'department': '',
                            'message': '',
                            'subscriber': $stateParams.id
                        };

                        $scope.modal.hide();

                    } else {
                        $translate(['failed_to_submit_due_to_an_error']).then(function(translations) {
                            //$cordovaToast.showShortBottom(translations.failed_to_submit_due_to_an_error);
                        });
                    }

                });
            } else {
                $translate(['failed_form_has_errors']).then(function(translations) {
                    //$cordovaToast.showShortBottom(translations.failed_form_has_errors);
                });
            }
        }

}]);

sehaApp.controller('ProfileOfferCtrl',
		['$scope', 'Data', '$stateParams', 'CONSTS', '$state', 'Auth', '$ionicLoading', '$translate', '$location',
    function($scope, Data, $stateParams, CONSTS, $state, Auth, $ionicLoading, $translate, $location) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>'
        });

        //Initialize all scope variables here
        $scope.user = [];
        $scope.pinboards = [];
        $scope.baseUrl = CONSTS.BASE_URL;

        //Load the basic details from database
        Data.get('profile?id=' + $stateParams.userID).then(function(result) {
            $scope.user = (result.code == 200) ? result.data : null;

            Data.get('user_offers?id=' + $stateParams.userID).then(function(result) {
                $scope.pinboards = (result.code == 200) ? result.data : null;
                $ionicLoading.hide();
            });

        });

        $scope.loadData = function() {

            var start = $scope.pinboards.length;

            Data.get('user_offers?id=' + $stateParams.userID + '&start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadedPinboards = _(result.data).toArray();
                    $scope.pinboards = _.union($scope.pinboards, loadedPinboards);

                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        $scope.profileNav = function() {
            $location.path('/app/profile/' + $stateParams.userID);
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

}])

.controller('ProfileReviewCtrl',
		['$scope', 'Data', '$stateParams', 'CONSTS', '$state', '$ionicLoading', '$translate', '$location', '$ionicModal',
    function($scope, Data, $stateParams, CONSTS, $state, $ionicLoading, $translate, $location, $ionicModal) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>'
        });

        //Initialize all scope variables here
        $scope.user = [];
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.reviews = []
        $scope.user = [];

        //Load the basic details from database
        Data.get('profile?id=' + $stateParams.id).then(function(result) {
            $scope.user = (result.code == 200) ? result.data : null;

            Data.get('reviews?user=' + $stateParams.id).then(function(result) {
                $scope.reviews = (result.code == 200) ? result.data : null;
                $ionicLoading.hide();
            });

        });

        $scope.loadData = function() {

            var start = $scope.reviews.length;

            Data.get('reviews?user=' + $stateParams.id + '&start=' + start).then(function(result) {

                if (result.code == 200) {
                    var loadedReviews = _(result.data).toArray();
                    $scope.reviews = _.union($scope.reviews, loadedReviews);

                } else {
                    $scope.moreData = true;
                }

                $scope.$broadcast('scroll.infiniteScrollComplete');

            });

        };

        $scope.goParent = function() {
            $location.path('/app/profile/' + $stateParams.id);
        };

        $scope.call = function(tel) {
            window.open('tel:' + tel.trim(), '_system');
        };

        $scope.review = {
            rating: 1,
            message: '',
            name: '',
            subscriber: $stateParams.id
        };

        //Add review popup window generator
        $ionicModal.fromTemplateUrl('templates/modals/review.html', {
            scope: $scope,
            animation: 'slide-in-up'
        }).then(function(modal) {
            $scope.modal = modal;
        });

        $scope.addReviewActivity = function() {
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

        $scope.rateUser = function(isValid) {

            if (isValid) {
                $ionicLoading.show({
                    template: '<div class="hg-loader"></div>'
                });

                Data.post('review', $scope.review).then(function(result) {

                    $ionicLoading.hide();

                    if (result.code == 200) {
                        $translate(['your_rating_has_submit_for_approval']).then(function(translations) {
                            //$cordovaToast.showLongBottom(translations.your_rating_has_submit_for_approval);
                        });
                        $scope.modal.hide();

                        Data.get('reviews?user=' + $stateParams.id).then(function(result) {
                            $scope.reviews = (result.code == 200) ? result.data : null;
                            $ionicLoading.hide();
                        });

                    } else {
                        $translate(['failed_to_submit_due_to_an_error']).then(function(translations) {
                            //$cordovaToast.showShortBottom(translations.failed_to_submit_due_to_an_error);
                        });
                    }

                });
            } else {
                $translate(['failed_form_has_errors']).then(function(translations) {
                    //$cordovaToast.showShortBottom(translations.failed_form_has_errors);
                });
            }

        };

}])

.controller('ProfileAppointmentCtrl',
		['$scope', 'Data', '$stateParams', 'CONSTS', '$state', '$location', 'Auth', '$localStorage', '$ionicLoading', '$translate', '$timeout',
    function($scope, Data, $stateParams, CONSTS, $state, $location, Auth, $localStorage, $ionicLoading, $translate, $timeout) {

        $ionicLoading.show({
            template: '<div class="hg-loader"></div>'
        });

        //Initialize all scope variables here
        $scope.user = [];
        $scope.offer = null;
        $scope.baseUrl = CONSTS.BASE_URL;
        $scope.departments = [];
        var voucherCode = null;

        $scope.userForm = {
            'name': '',
            'contact': '',
            'email': '',
            'voucher_code': '',
            'message': '',
            'voucher': 0
        };

        //Load the basic details from database
        Data.get('profile?id=' + $stateParams.userID).then(function(result) {

            $scope.user = (result.code == 200) ? result.data : null;
            $ionicLoading.hide();
        });


        $scope.profileNav = function() {
            $location.path('/app/profile/' + $stateParams.userID);
        };

        $scope.findVoucher = function() {
            $state.go('app.pinboards');
        }

        //Load offer details if has any offerID
        if ($stateParams.offerID != null && $stateParams.offerID && $stateParams.offerID != 'null') {

            Data.get('offer?id=' + $stateParams.offerID).then(function(result) {

                $scope.offer = (result.code == 200) ? result.data : null;
                $scope.userForm.voucher = 1;
                $scope.userForm.voucher_code = ($scope.offer) ? $scope.offer.voucher_code : '';
                $scope.userForm.department = ($scope.offer) ? $scope.offer.title_en : '';

                voucherCode = $scope.offer.voucher_code;
            });
        }

        $scope.toggleVoucher = function() {
            $scope.userForm.voucher = ($scope.userForm.voucher == 1) ? 0 : 1;

            if ($scope.userForm.voucher == 0) {
                $scope.userForm.voucher_code = '';
            } else {
                $scope.userForm.voucher_code = (voucherCode != null) ? voucherCode : '';
            }
        };

        $scope.appointment = function(valid) {

            if (valid) {
                $ionicLoading.show({
                    template: '<div class="hg-loader"></div>',
                    noBackdrop: true
                });

                var params = {
                    name: $scope.userForm.name,
                    contact: $scope.userForm.contact,
                    message: $scope.userForm.message,
                    email: $scope.userForm.email,
                    subs: $stateParams.userID
                };

                Data.post('send_app', params).then(function(result) {

                    $ionicLoading.hide();

                    if (!result.error) {

                        $scope.userForm = {
                            'name': '',
                            'contact': '',
                            'email': '',
                            'message': ''
                        };

                        $location.path('/app/profile/' + $stateParams.userID);

                        $translate(['appointment_response']).then(function(translations) {
                            //$cordovaToast.showLongBottom(translations.appointment_response);
                        });

                    } else {

                        $translate(['failed']).then(function(translations) {
                            //$cordovaToast.showShortBottom(translations.failed);
                        });

                    }

                });

            } else {
                $translate(['failed']).then(function(translations) {
                    //$cordovaToast.showShortBottom(translations.failed);
                });
            }

        };

}]);

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

sehaApp.controller('SettingsCtrl',
		['$scope', 'CONSTS', 'Data', '$ionicModal', '$ionicPopup', '$localStorage', '$translate',
    function($scope, CONSTS, Data, $ionicModal, $ionicPopup, $localStorage, $translate) {

        //Initialize scope variables
        $scope.user = {
            countryOpt: (typeof $localStorage.country != 'undefined' && $localStorage.country != null) ? $localStorage.country : '',
            languageOpt: (typeof $localStorage.lang != 'undefined' && $localStorage.lang != null) ? $localStorage.lang : 'Arabic',
            countryEn: (typeof $localStorage.countryEn != 'undefined' && $localStorage.countryEn != null) ? $localStorage.countryEn : '',
            countryAr: (typeof $localStorage.countryAr != 'undefined' && $localStorage.countryAr != null) ? $localStorage.countryAr : ''
        };

        $scope.isNotificationEnabled = (typeof $localStorage.enableNotification != 'undefined' && $localStorage.enableNotification != null) ? $localStorage.enableNotification : true;

        $scope.country = [];

        $scope.showPopup = function() {

            $translate(['choose_country', 'change', 'cancel']).then(function(translations) {

                var alertPopup = $ionicPopup.alert({

                    title: translations.choose_country,
                    templateUrl: 'templates/modals/country.html',
                    scope: $scope,
                    buttons: [{
                        text: translations.change,
                        type: 'button-primary button-dk',
                        onTap: function(e) {
                            $localStorage.country = $scope.user.countryOpt;
                        }

                    }, {
                        text: translations.cancel,
                        type: 'button-default',
                        onTap: function(e) {

                        }
                    }]

                });

            });

        };

        $scope.showPopupLang = function() {

            $translate(['choose_language', 'change']).then(function(translations) {

                var alertPopup = $ionicPopup.alert({

                    title: translations.choose_language,
                    templateUrl: 'templates/modals/language.html',
                    scope: $scope,
                    buttons: [{
                        text: translations.change,
                        type: 'button-primary button-block button-dk',
                        onTap: function(e) {
                            $localStorage.lang = $scope.user.languageOpt;
                            $translate.use($localStorage.lang);
                        }

                    }]

                });

            });

        };

        //Load the coutries from database
        Data.get('country').then(function(result) {
            $scope.country = (result.code == 200) ? _(result.data).toArray() : null;
        });

        $scope.setCountry = function(country) {
            $localStorage.country = country.id;
            $scope.user.countryEn = $localStorage.countryEn = country.name_en;
            $scope.user.countryAr = $localStorage.countryAr = country.name_ar;
        };

}]);

sehaApp.controller('SidemenuCtrl',
		['$scope', '$state', '$translate', '$localStorage', '$translate',
    function($scope, $state, $translate, $localStorage, $translate) {

        $scope.settingsActivity = function() {
            $state.go('app.settings');
        };

        $scope.changeLanguage = function(lang) {
            $localStorage.lang = lang;
            $translate.use($localStorage.lang);
        };

        $scope.shareApp = function() {
						
        };

}]);

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
