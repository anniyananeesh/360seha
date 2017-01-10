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
