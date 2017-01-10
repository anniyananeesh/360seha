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
