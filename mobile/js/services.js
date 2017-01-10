sehaApp.factory("Data", ['$http','CONSTS','$localStorage', function ($http,CONSTS,$localStorage) {

        var serviceBase = CONSTS.API_SERVER;

        var obj = {};
        obj.get = function (q) {

        	var country = (typeof $localStorage.country != 'undefined' && $localStorage.country != null) ? $localStorage.country : '';
        	q += (q.indexOf("?") > 0) ? '&ctry='+country : '?ctry='+country;

            return $http.get(unescape(encodeURIComponent(serviceBase + q))).then(function (results) {
                return results.data;
            });
        };

        obj.getUrl = function (q) {
            return $http.get(q)
            .success(function(data){
                return data;
            })
            .error(function(err){
              return err;
            });
        };

        obj.post = function (q, object) {
            return $http.post(serviceBase + q, object).then(function (results) {
                return results.data;
            });
        };
        obj.put = function (q, object) {
            return $http.put(serviceBase + q, object).then(function (results) {
                return results.data;
            });
        };
        obj.delete = function (q) {
            return $http.delete(serviceBase + q).then(function (results) {
                return results.data;
            });
        };

        obj.updateViewCnt = function(usr){
          return $http.put(serviceBase + 'updateViewCnt',{'usr':usr}).then(function (results) {
            return results.data;
          });
        };
        return obj;
}])

.directive('fancybox', function ($compile, $http, CONSTS) {
    return {
        restrict: 'A',

        controller: function($scope) {

            $scope.openFancybox = function (url) {
                 $.fancybox.open({
                	href : CONSTS.BASE_URL + 'uploads/gallery/photo/' + url
		         });
            };

        }
    };
})

.factory('Auth', ["$cookieStore", function ($cookieStore) {

    var _user = $cookieStore.get('sehaApp.user'),
       _favourites = $cookieStore.get('sehaApp.favourites'),
       _likes = $cookieStore.get('sehaApp.likes'),
       _pinlikes = $cookieStore.get('sehaApp.pinlikes'),
       _pinboardInterests = $cookieStore.get('sehaApp.pinterests');

    var setUser = function (user) {
      _user = user;
      $cookieStore.put('sehaApp.user', _user);
    }

    var setFavourites = function(favourites){
      _favourites = favourites;
      $cookieStore.put('sehaApp.favourites', _favourites);
    }

    var setLikes = function(likes){
      _likes = likes;
      $cookieStore.put('sehaApp.likes', _likes);
    }

    var setPinLikes = function(pinlikes){
      _pinlikes = pinlikes;
      $cookieStore.put('sehaApp.pinlikes', _pinlikes);
    }

    var setPinInterests = function(pinInterests){
      _pinboardInterests = pinInterests;
      $cookieStore.put('sehaApp.pinterests', _pinboardInterests);
    }

   return {
      setUser: setUser,
      setFavourites: setFavourites,
      setLikes: setLikes,
      setPinLikes: setPinLikes,
      setPinInterests: setPinInterests,
      isLoggedIn: function () {
         return _user ? true : false;
      },
      getUser: function () {
         return _user;
      },
      getFavourites: function () {
         return _favourites;
      },
      getLikes: function () {
         return _likes;
      },
      getPinLikes: function () {
         return _pinlikes;
      },
      getPinInterests: function () {
         return _pinboardInterests;
      },
      logout: function () {

         $cookieStore.remove('sehaApp.user');
         $cookieStore.remove('sehaApp.favourites');
         $cookieStore.remove('sehaApp.likes');
         $cookieStore.remove('sehaApp.pinlikes');
         $cookieStore.remove('sehaApp.pinterests');

         _user = null;
         _favourites = null;
         _likes = null;
         _pinlikes = null;
         _pinboardInterests= null;

      }
   }

}])

.filter('durationview', function () {

    return function (input, css) {

    	  var t = Date.parse(input) - Date.parse(new Date());
    	  var seconds = Math.floor( (t/1000) % 60 );
    	  var minutes = Math.floor( (t/1000/60) % 60 );
    	  var hours = Math.floor( (t/(1000*60*60)) % 24 );
    	  var days = Math.floor( t/(1000*60*60*24) );

    	  data = {
    	     'total': t,
    	     'days': days,
    	     'hours': hours,
    	     'minutes': minutes,
    	     'seconds': seconds
    	  };

    	  return data.days + "d " + data.hours + "h " + data.minutes + "m " + data.seconds + "s ";
    };

});
