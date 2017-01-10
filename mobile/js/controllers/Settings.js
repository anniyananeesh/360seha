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
