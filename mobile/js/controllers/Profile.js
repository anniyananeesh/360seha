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
