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
