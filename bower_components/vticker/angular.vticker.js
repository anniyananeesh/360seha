/* --- Made by Vikrant Mahajan and licensed under MIT license --- */

var app = angular.module('vticker', []);
app.directive('ticker', function($timeout){
  return {
    restrict: 'E',
    scope:{
      ticks:"="
    },
    template:"<div class='promo-ticker'><ul><li data-ng-repeat='tick in ticks' ng-bind-html='tick|trust'></li></ul><div>",
    link: function(scope, element, attrs, autoCtrl){
      scope.$watch('ticks',function(val){
        if(val){
          $timeout(function(){
            jQuery(element).find('.promo-ticker').vTicker();
          },500);
        }
      });
    }
  };
}).filter('trust', [
'$sce',
function($sce) {
  return function(value, type) {
    return $sce.trustAs(type || 'html', value);
  }
}
]);
