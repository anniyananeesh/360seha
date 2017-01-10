sehaApp.controller('FooterCtrl',
    ['$scope', '$state',
    function($scope, $state) {

    $scope.NavActivity = function(state) {
        $state.go(state);
    };

}]);
