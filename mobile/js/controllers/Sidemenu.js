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
