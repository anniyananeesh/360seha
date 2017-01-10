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
