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
