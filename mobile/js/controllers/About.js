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
