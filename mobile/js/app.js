'use strict';

var sehaApp = angular.module('sehaApp', ['ionic', 'ngGeolocation','ngStorage', 'ngCookies', 'pascalprecht.translate', 'ngMessages', 'ngMap', 'ngRateIt']);

sehaApp.config(['$stateProvider', '$urlRouterProvider', '$httpProvider', '$ionicConfigProvider', function($stateProvider, $urlRouterProvider, $httpProvider, $ionicConfigProvider) {

    $httpProvider.defaults.cache = false;

    $stateProvider.state('app', {
        url: "/app",
        abstract: true,
        templateUrl: "templates/menu.html"
    })

    .state('app.home', {
        url: "/home",
        views: {
            'menuContent': {
                templateUrl: "templates/home.html",
                controller: 'HomeCtrl'
            }
        },
        onEnter: function($state, $localStorage) {

            if (typeof $localStorage.country == 'undefined' || $localStorage.country == null) {
                $state.go('app.choose_country');
            }
        }

    })

    .state('app.about', {
        url: "/about",
        views: {
            'menuContent': {
                templateUrl: "templates/about.html",
                controller: 'AboutCtrl'
            }
        }
    })

    .state('app.get_listed', {
        url: "/get_listed",
        views: {
            'menuContent': {
                templateUrl: "templates/get-listed.html",
                controller: 'ListedCtrl'
            }
        }
    })


    .state('app.choose_country', {
        url: "/choose_country",
        views: {
            'menuContent': {
                templateUrl: "templates/choose-country.html",
                controller: 'CountryCtrl'
            }
        }
    })

    .state('app.emergency', {
        url: "/emergency",
        views: {
            'menuContent': {
                templateUrl: "templates/emergency.html",
                controller: 'EmergencyCtrl'
            }
        }
    })

    .state('app.notifications', {
        url: "/notifications",
        views: {
            'menuContent': {
                templateUrl: "templates/notifications.html",
                controller: 'NotificationsCtrl'
            }
        }
    })

    .state('app.search', {
        url: "/search",
        views: {
            'menuContent': {
                templateUrl: "templates/search.html",
                controller: 'SearchCtrl'
            }
        }
    })

    .state('app.advertise', {
        url: "/advertise",
        views: {
            'menuContent': {
                templateUrl: "templates/advertise.html",
                controller: 'AdvertiseCtrl'
            }
        }
    })

    .state('app.appointment', {
        url: "/appointment/:userID/:offerID",
        views: {
            'menuContent': {
                templateUrl: "templates/profile/appointment.html",
                controller: 'ProfileAppointmentCtrl'
            }
        }
    })

    .state('app.review', {
        url: "/review/:id",
        views: {
            'menuContent': {
                templateUrl: "templates/profile/review.html",
                controller: 'ProfileReviewCtrl'
            }
        }
    })

    .state('app.profile_offers', {
        url: "/profile_offers/:userID",
        views: {
            'menuContent': {
                templateUrl: "templates/profile/offers.html",
                controller: 'ProfileOfferCtrl'
            }
        }
    })

    .state('app.profile', {
        url: "/profile/:id",
        views: {
            'menuContent': {
                templateUrl: "templates/profile/home.html",
                controller: 'ProfileCtrl'
            }
        }
    })

    .state('app.settings', {
        url: "/settings",
        views: {
            'menuContent': {
                templateUrl: "templates/settings.html",
                controller: 'SettingsCtrl'
            }
        }
    })

    .state('app.news', {
        url: "/news",
        views: {
            'menuContent': {
                templateUrl: "templates/news.html",
                controller: 'NewsCtrl'
            }
        }
    })

    .state('app.news_details', {
            url: "/news_details/:id",
            views: {
                'menuContent': {
                    templateUrl: "templates/news-details.html",
                    controller: 'NewsDetailsCtrl'
                }
            }
    })

    .state('app.articles', {
        url: "/articles",
        views: {
            'menuContent': {
                templateUrl: "templates/articles.html",
                controller: 'ArticlesCtrl'
             }
         }
    })

    .state('app.article_details', {
        url: "/article_details/:id",
        views: {
            'menuContent': {
                templateUrl: "templates/article-details.html",
                controller: 'ArticleDetailsCtrl'
            }
        }
    })

    .state('app.tips', {
        url: "/tips",
        views: {
            'menuContent': {
                templateUrl: "templates/tips.html",
                controller: 'TipsCtrl'
            }
        }
    })

    .state('app.tips_details', {
        url: "/tips_details/:id",
        views: {
            'menuContent': {
                templateUrl: "templates/tips-details.html",
                controller: 'TipsDetailsCtrl'
            }
        }
    })

    .state('app.pinboards', {
        url: "/pinboards",
        views: {
            'menuContent': {
                templateUrl: "templates/pinboards.html",
                controller: 'PinboardsCtrl'
            }
        }
    })

    .state('app.pinboard_details', {
        url: "/pinboard_details/:id",
        views: {
            'menuContent': {
                templateUrl: "templates/pinboard-details.html",
                controller: 'PinboardDetailsCtrl'
            }
        }
    });

    $urlRouterProvider.otherwise('/app/home');
    $ionicConfigProvider.backButton.text('').previousTitleText(false);;
    $ionicConfigProvider.navBar.alignTitle('center');
    $ionicConfigProvider.views.swipeBackEnabled(false);

}]);

sehaApp.config(['$translateProvider', function($translateProvider) {

    $translateProvider.translations('English', {

        advertise_with_us: "Advertise with us",
        your_name: "Your Fullname",
        email_id: "Email ID",
        contact_no: "Contact No.",
        company_name: "Company Name",
        message: "Message",
        send_request: "Send Request",
        article_details: "Article Details",
        share: "Share",
        latest_articles: "Latest Articles",
        read_now: "Read Now",
        choose_country: "Choose Country",
        twnty_four_emergency: "24Hr Emergency",
        emergency_toll_free: "Emergency",
        min_length_error: "Minimum length is 8",
        max_length_error: "Maximum length is 12",
        forgot_password: "Forgot password",
        fill_email_and_reset: "Fill your email address and reset.",
        email_address: "Email Address",
        reset_password: "Reset Password",
        find_book_health_centers: "Find and book",
        health_centers_around: "Health Centres around you",
        enter_your_location: "Enter your location",
        select_your_services: "Select your services",
        cancel: "Cancel",
        quick_access: "Quick Access",
        home: "Home",
        news: "News",
        offers: "Offers",
        user_account: "User Account",
        sign_in: "Sign in",
        register: "Register",
        my_profile: "My Profile",
        logout: "Logout",
        subscriber_account: "Subscriber Account",
        get_listed_with_us: "Get listed with us",
        my_chats: "My Chats",
        account_info: "Account Info",
        change_password: "Change password",
        news_details: "News Details",
        latest_news: "Latest News",
        pinboard_details: "Pinboard Details",
        pinboards: "Pinboards",
        code: "CODE",
        get_it: "Get it",
        locate: "Locate",
        call: "Call",
        search: "Search",
        featured: "Featured",
        settings: "Settings",
        change_country: "Change Country",
        language: "Language",
        notifications: "Notifications",
        password: "Password",
        remember_me: "Remember Me",
        facebook_sign_in: "Facebook Signin",
        already_register_signin: "Already registerd ? Signin now.",
        register_now: "Register Now",
        register_to_save: "Register with us to save more.",
        share_your_location: "Share your location",
        confirm_password: "Confirm Password",
        tips_details: "Tips Details",
        health_tips: "Health Tips",
        find_your: "Find more",
        voucher: "Voucher",
        enter_your_message: "Enter your message...",
        list_view: "List View",
        map_view: "Map View",
        find_out: "Find Out",
        services: "Services",
        get: "Get",
        advance_search: "Advance Search",
        city: "City",
        insurance: "Insurance",
        emergency: "Emergency",
        no: "No",
        yes: "Yes",
        choose_services: "Choose Service",
        select_your_department: "Select your department",
        pick_date: "Pick your date",
        pick_time: "Preferred Time",
        have_voucher: "Have a voucher",
        fill_in: "Fill it & Get it",
        n_make_appointment: "& Make Appointment",
        chat: "Chat",
        mail: "Mail",
        fav: "Fav",
        timing: "Timing",
        make_appointment: "Make Appointment",
        about: "About Us",
        photo_gallery: "Photo Gallery",
        video_gallery: "Video Gallery",
        our_location: "Our Location",
        parking: "Parking",
        bus: "Bus",
        metro_station: "Metro Station",
        n_send_message: "& Send Message",
        send_message: "Send Message",
        put_username_email: "Put your username or email.",
        vendor_username: "Vendor Username",
        reset_my_password: "Reset my password",
        vendor_login: "Vendor Login",
        welcome_back_vendor: "Welcome back Vendor!",
        update_password: "Update Password",
        current_password: "Current Password",
        new_password: "New Password",
        name_in_english: "Name in English",
        name_in_arabic: "Name in Arabic",
        profile: "Profile",
        favourites: "Favourites",
        remove: "Remove",
        hi: "Hi",
        success: "Success",
        failed: "Failed",
        unknown_error: "Unknown Error",
        password_not_matching: "Password not matching",
        no_user_found: "No user found",
        requesting: "Requesting...",
        loading: "Loading...",
        sending: "Sending...",
        please_wait: "Please wait...",
        mail_send: "Mail send...",
        request_send: "Request send...",
        advertise_text: "Hi, we want to advertise with 360Seha.",
        change: "Change",
        choose_language: "Choose Language",
        featured_services: "Featured Services",
        details: "Details",
        choose: "Choose",
        appointment_response: "Thanks...your appointment request has been send. We'll get back to you shortly",
        not_available: "N/A",
        my_appointments: "My Appointments",
        current: "Current",
        previous: "Previous",
        about_us: "About Us",
        closed: "Closed",
        location: "Location",
        photos: "Photos",
        videos: "Videos",
        follow_us_on: "Follow us on",
        payments: "Payments",
        accepts_insurance: "Accepts Insurance",
        cash: "Cash",
        credit_card: "Credit Card",
        debit_card: "Debit Card",
        share_app: "Share app",
        dont_have_account: "Don't have an account?",
        always_open: "Always Open",
        your_request_has_send: "Your request has been send. Our customer care executive will contact you shortly",
        your_rating_has_submit_for_approval: "Your review has been submitted for approval",
        reviews: "Reviews",
        read_reviews: "Read Reviews",
        get_offer: "Get Offer",
        add_review: "Add Review",
        failed_to_submit_due_to_an_error: "Failed to submit due to an error",
        failed_form_has_errors: "Failed , your form has errors",
        upload_your_images: "Upload your company images",
        maximum_five_images: "Maximum 5 images",
        company_name_english: "Company name",
        company_name_arabic: "Company name (Arabic)",
        you_are_a: "You are a",
        having_depts_in: "Having departments in",
        official_email_address: "Official email address",
        official_contact_no: "Contact No",
        share_business_location: "Share your business location",
        tell_us_more_about_ur_company: "Tell more about your company",
        get_listed: "Get listed",
        how_many_stars_you_rate: "How many stars you rate",
        write_your_review: "Write your review",
        submit: "Submit",
        departments_chosen: "Departments Chosen",
        choose_departments: "Choose Departments",
        departments_we_have: "Departments we have :",
        add_your_company: "Add your company",
        website_or_facebook_link: "Website",
        ask_the_doctor: "Ask the doctor",
        success_ask_doctor: "Thank you for your question. We'll reply back to you as soon as possible",
        click_here: "Click Here",
        question: "Question",
        find_more_aboutus: "Find more about us",
    });

    $translateProvider.translations('Arabic', {

        advertise_with_us: "أعلن معنا",
        your_name: "الاسم الكامل",
        email_id: "البريد الالكتروني",
        contact_no: "رقم التواصل",
        company_name: "اسم الشركة",
        message: "رسالة",
        send_request: "أرسل الطلب",
        article_details: "تفاصيل المقالة",
        share: "شارك",
        latest_articles: "آخر المقالات",
        read_now: "إقرأ الآن",
        choose_country: "اختر البلد",
        twnty_four_emergency: "24 ساعة طوارئ",
        emergency_toll_free: "طوارئً",
        min_length_error: "أقل طول هو 8",
        max_length_error: "أكثر طول هو 12",
        forgot_password: "نسيت كلمة المرور",
        fill_email_and_reset: "اكتب بريدك الالكتروني واستعدها",
        email_address: "عنوان البريد الالكتروني",
        reset_password: "استرجاع كلمة المرور",
        find_book_health_centers: "جد وأحجز",
        health_centers_around: "المراكز الصحية من حولك",
        enter_your_location: "أختر موقعك",
        select_your_services: "أختر الخدمة",
        cancel: "إلغاء",
        quick_access: "الدخول السريع",
        home: "الرئيسة",
        news: "الأخبار",
        health_tips: "نصائح صحية",
        offers: "العروض ",
        user_account: "حساب المستخدم",
        sign_in: "تسجيل الدخول",
        register: "سجل معنا",
        my_profile: "ملفي",
        logout: "تسجيل الخروج",
        subscriber_account: "حساب المزود",
        get_listed_with_us: "اشترك معنا",
        my_chats: "محادثاتي",
        account_info: "معلومات الحساب",
        change_password: "غير كلمة المرور",
        settings: "الإعدادات",
        news_details: "تفاصيل الأخبار",
        latest_news: "آخر الأخبار",
        pinboard_details: "تفاصيل العروض",
        pinboards: "العروض",
        code: "الرمز",
        get_it: "أحصل عليه",
        locate: "الموقع",
        call: "اتصل",
        search: "ابحث",
        featured: "مميز",
        change_country: "غير البلد",
        language: "اللغة",
        notifications: "التنبيهات",
        password: "كلمة المرور",
        remember_me: "تذكرني",
        facebook_sign_in: "تسجيل الدخول بواسطة الفيس بوك",
        already_register_signin: "مسجل من قبل ؟ سجل دخولك الآن",
        register_now: "سجل الآن",
        register_to_save: "سجل معنا لتوفر أكثر",
        share_your_location: "شاركنا موقعك",
        confirm_password: "تأكيد كلمة المرور",
        tips_details: "تفاصيل النصائح",
        find_your: "ابحث عن",
        voucher: "قسيمتك",
        enter_your_message: "أكتب رسالتك ",
        list_view: "عرض قائمة",
        map_view: "عرض خريطة",
        find_out: "خدمات",
        services: "ساعة",
        get: "أحصل على",
        advance_search: "بحث متقدم",
        city: "المدينة",
        insurance: "التأمين",
        emergency: "الطوارئ",
        no: "لا",
        yes: "نعم",
        choose_services: "أختر الخدمة",
        select_your_department: "أختر القسم الطبي",
        pick_date: "حدد تاريخ الموعد",
        pick_time: "الوقت المفضل للموعد",
        have_voucher: "هل تملك قسيمة",
        fill_in: "املئ البيانات واحصل على العرض",
        n_make_appointment: "واحجز موعد",
        chat: "المحادثة",
        mail: "البريد",
        fav: "المفضلة",
        timing: "أوقات العمل",
        make_appointment: "أحجز موعد",
        about: "من نحن",
        photo_gallery: "الصور",
        video_gallery: "المرئيات",
        our_location: "موقعنا",
        parking: "موقف السيارات",
        bus: "الحافلة",
        metro_station: "محطة المترو",
        n_send_message: "وأرسل رسالة",
        send_message: "أرسل الرسالة",
        put_username_email: "اكتب اسمك المستخدم والبريد",
        vendor_username: "اسم مزود الخدمة",
        reset_my_password: "استعادة كلمة المرور",
        vendor_login: "تسجيل دخول المزود",
        welcome_back_vendor: "أهلا بعودتك",
        update_password: "تحديث كلمة المرور",
        current_password: "كلمة المرور الحالية",
        new_password: "كلمة المرور الجديدة",
        name_in_english: "الاسم باللانجليزي",
        name_in_arabic: "الاسم بالعربي",
        profile: "الملف",
        favourites: "المفضلات",
        remove: "إزالة",
        hi: "مرحباً",
        success: "نجاح",
        failed: "فشل",
        unknown_error: "خطأ غير معروف",
        password_not_matching: "كلمة المرور غير متطابقة",
        no_user_found: "لايوجد مستخدم",
        requesting: "طلب...",
        loading: "تحميل...",
        sending: "إرسال...",
        please_wait: "الرجاء الانتظار..",
        mail_send: "تم ارسال البريد ...",
        request_send: "تم ارسال الطلب...",
        advertise_text: "مرحباً ارغب في الاعلان في ٣٦٠ صحة",
        change: "تغيير",
        choose_language: "اختر اللغة",
        featured_services: "خدمات مميزة",
        details: "تفاصيل",
        choose: "اختر",
        appointment_response: "شكراً لقد تم إرسال طلبك حجز الموعد .سوف نعاود الاتصال بك قريباً",
        enter_voucher_code: "ضع رمز القسيمة",
        not_available: "N/A",
        my_appointments: "مواعيدي",
        current: "الحالية",
        previous: "السابقة",
        about_us: "من نحن",
        closed: "مغلق",
        location: "الموقع",
        photos: "الصور",
        videos: "الفيديو",
        follow_us_on: "تابعنا على",
        payments: "الدفع",
        accepts_insurance: "قبول التأمين",
        cash: "نقداً",
        credit_card: "بطاقة ائتمان",
        debit_card: "Debit Card",
        share_app: "شارك التطبيق",
        dont_have_account: "ليس لديك حساب؟",
        always_open: "دائماً مفتوح",
        your_request_has_send: "تم ارسال طلبك .سوف يقوم أحد موظفينا بالتواصل معك قريباً",
        your_rating_has_submit_for_approval: "لقد تم ارسال تقييمك للموافقة",
        reviews: "التقييمات",
        read_reviews: " التقييمات",
        get_offer: "أحصل على العرض",
        add_review: "أضف تعليقاً",
        failed_to_submit_due_to_an_error: "فشل في الأرسال هناك خلل ما",
        failed_form_has_errors: "فشل ,هناك مشلكة في النموذج",
        upload_your_images: "اضف صورة شركتك",
        maximum_five_images: "الحد الأقصى 5 صور",
        company_name_english: "اسم الشركة بالانجليزي",
        company_name_arabic: "اسم الشركة",
        you_are_a: "نوع النشاط",
        having_depts_in: "الخدمات التي تقدمها",
        official_email_address: "الايميل الرسمي",
        official_contact_no: "رقم التواصل",
        share_business_location: "شاركنا موقعك",
        tell_us_more_about_ur_company: "أخبرنا المزيد عنك",
        get_listed: "اضف مركزك",
        how_many_stars_you_rate: "قيم المركز",
        write_your_review: "اكتب تقييمك",
        submit: "أرسل",
        departments_chosen: "الأقسام المختارة",
        choose_departments: "اختر الأقسام",
        departments_we_have: "الخدمات المقدمة",
        add_your_company: "اضف شركتك",
        website_or_facebook_link: "Website",
        ask_the_doctor: "إسأل الطبيب",
        success_ask_doctor: "شكراً  لتواصلك معنا سوف نقوم بالرد على سؤالك في اسرع وقت ممكن",
        click_here: "انقر هنا",
        question: "السؤال",
        find_more_aboutus: "Find more about us",
    });

    $translateProvider.preferredLanguage("Arabic");
    $translateProvider.fallbackLanguage("Arabic");

}]);

sehaApp.factory('Language', ['$translate', function($translate) {

    var rtlLanguages = ['Arabic'];

    var isRtl = function() {

        var languageKey = $translate.proposedLanguage() || $translate.use();
        for (var i = 0; i < rtlLanguages.length; i += 1) {
            if (languageKey.indexOf(rtlLanguages[i]) > -1)
                return true;
        }

        return false;
    };

    var getLang = function() {
        var languageKey = $translate.proposedLanguage() || $translate.use();
        return languageKey;
    }

    return {
        isRtl: isRtl,
        getLang: getLang
    };

}]);

sehaApp.run(['$rootScope', 'Language', function($rootScope, Language) {
    $rootScope.Language = Language;
}]);

sehaApp.filter('htmlToPlaintext', function() {
    return function(text) {
        return text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
});

Array.prototype.remove = function(from, to) {

    var rest = this.slice((to || from) + 1 || this.length);
    this.length = from < 0 ? this.length + from : from;
    return this.push.apply(this, rest);
};
