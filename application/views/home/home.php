<div id="map" class="map" style="background: url('<?php echo base_url();?>assets/home/img/ic_loader.svg') no-repeat 50% 50% #f0ede5;"></div>

<style type="text/css">

  .info-item
  {
    display: inline-block;
    position: relative;
    width: 340px;
    height: auto;
    background: rgba(256,256,256, 0.9);
    padding: 10px;
    -webkit-box-shadow: -2px -5px 94px -1px rgba(0,0,0,0.33);
    -moz-box-shadow: -2px -5px 94px -1px rgba(0,0,0,0.33);
    box-shadow: -2px -5px 94px -1px rgba(0,0,0,0.33);
  }

  #map
  {
     width: 100%;
     height: 600px;
     border-bottom: #008eca solid 2px;
     border-top: #dedbd1 solid 1px;
  }

  @media screen and (min-width: 319px) and (max-width: 960px) {

    #map
    {
       width: 100%;
       height: 300px;
       border-bottom: #008eca solid 2px;
       border-top: #dedbd1 solid 1px;
    }

  }

  .info-item-content
  {
     display: block;
     position: relative;
     line-height: 18px;
     padding-top: 10px;
  }

  .info-item-content.ltr
  {
     padding-left: 110px;
  }

  .info-item-content.rtl
  {
     padding-right: 110px;
  }

  .info-item-content h2
  {
    margin: 0px;
    font-size: 18px;
    color: #333;
    line-height: 22px;
  }

  .infoBox
  {
    width: 340px!important;
  }

  .closeInfoItem
  {
    position: absolute!important;
    top: 0px!important;
    right: 0px!important;
  }

  .bordered
  {
    border: #333 solid 1px;
  }

  .info-emergency
  {
    font-size: 12px;
    color: #e40f0f;
    font-weight: bold;
    display: inline-block;
    padding: 0px 8px;
  }

  .info-item-footer
  {
    display: block;
    position: relative;
    width: auto;
    height: auto;
  }

  .info-item-footer span
  {
    width: 31.3333333%;
    display: inline-flex;
    justify-content: flex-start;
    align-items: center;
  }

  .info-item-footer span.ltr
  {
    float: left;
  }

  .info-item-footer span.rtl
  {
    float: right;
  }

  .info-item-footer span i
  {
    font-size: 16px;
    color: #333;
    margin: 0px 5px;
  }

  .featured.ltr
  {
    display: block;
    position: absolute;
    top: 48px;
    right: -72px;
    background: #d29600;
    width: 120px;
    height: 23px;
    -ms-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    transform: rotate(-90deg);
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
    padding-top: 2px;
  }

  .featured.rtl
  {
    display: block;
    position: absolute;
    top: 48px;
    left: -72px;
    background: #d29600;
    width: 120px;
    height: 23px;
    -ms-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    transform: rotate(-90deg);
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
    padding-top: 2px;
  }

</style>

<script type="text/javascript">

    var styles = [

      {
        stylers: [
          { hue: "#00ffe6" },
          { saturation: -20 }
        ]
      },
      {
        featureType: "road",
        elementType: "geometry",
        stylers: [
          { lightness: 100 },
          { visibility: "simplified" }
        ]
      },
      {
        featureType: "road",
        elementType: "labels",
        stylers: [
          { visibility: "off" }
        ]
      }

    ];
    // 00AFF0
    var theme_array  = {
        "snazzy"    :  [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#ff0000"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2ecc71"}]},{"featureType":"poi","stylers":[{"color":"#2ecc71"},{"lightness":-7}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-28}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"visibility":"on"},{"lightness":-15}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-18}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-34}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#333739"},{"weight":0.8}]},{"featureType":"poi.park","stylers":[{"color":"#2ecc71"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#333739"},{"weight":0.3},{"lightness":10}]}],
        "pale"      : [{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#89cdf2"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}],
        "bright"    : [{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]}],
        "neutral"   : [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}],
        "blue"      : [{"featureType":"water","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#f2f2f2"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]}],
        "subtle"    : [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],
        "grayed"    : [{"featureType":"poi","stylers":[{"visibility":"off"}]},{"stylers":[{"saturation":-70},{"lightness":37},{"gamma":1.15}]},{"elementType":"labels","stylers":[{"gamma":0.26},{"visibility":"off"}]},{"featureType":"road","stylers":[{"lightness":0},{"saturation":0},{"hue":"#ffffff"},{"gamma":0}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"lightness":50},{"saturation":0},{"hue":"#ffffff"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"},{"lightness":-50}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"lightness":20}]}],
        "apple"     : [{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"lightness":"27"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"lightness":"23"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"lightness":"25"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"saturation":"0"},{"lightness":"25"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"lightness":"50"}]},{"featureType":"road.highway.controlled_access","elementType":"labels","stylers":[{"lightness":"32"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"lightness":"66"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"lightness":"70"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"transit.line","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"saturation":"-100"}]}]
    };

    var LocationsArr = new Array();


    function initialize()
    {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
                loadGeoGoogleMap(position.coords.latitude, position.coords.longitude)
            }, function(){
                loadGeoGoogleMap(<?php echo $lat?>, <?php echo $long?>);
            });
        } else {
            loadGeoGoogleMap(<?php echo $lat?>, <?php echo $long?>);
        }
    }

    function json2array(json){

        var result = [];
        $.each(json, function (i,v)
        {
            result.push(v);
        });

        return result;
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function loadGeoGoogleMap(lat,long)
    {
        $.get('<?php echo base_url()?>async/get_nearby?_lt=' + lat + '&_lng='+ long + '&_r=20',function(r){

            if(r.code == 200)
            {
                LocationsArr = json2array(r.data);

                var maplace = new Maplace({

                    locations: LocationsArr,
                    map_options: {
                      streetViewControl: false,
                      mapTypeControl: false,
                      styles: theme_array["apple"],
                      zoom: 16,
                      mapTypeId: google.maps.MapTypeId.ROAD,
                      tilt: 45,
                      heading: 90,
                      zoomControl: false,
                      zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE,
                        position: google.maps.ControlPosition.TOP_RIGHT
                      },
                      panControl: false,
                      panControlOptions: {
                          position: google.maps.ControlPosition.TOP_RIGHT
                      }
                    },

                    controls_on_map: false,
                    show_markers: true,
                    infowindow_type: 'bubble',
                    map_div: '#map'

                });

                //position.coords.longitude
                var MyLocation = [{
                  lat: lat,
                  lon: long,
                  icon: '<?php echo base_url();?>themes/default/assets/img/ic_locate.png'
                }];

                maplace.AddLocations(MyLocation);
                maplace.Load({
                  map_options: {set_center: [lat,long], zoom: 16, mapTypeId:google.maps.MapTypeId.ROAD, tilt: 45}
                });

                //$.get('<?php echo base_url()?>async/save_cordinates/'+lat+'/'+long);

                maplace.Load();

            }
            else
            {
                alert("no data");
            }

        }, 'json');

    }

  </script>
  <!--/map-->

  <script type="text/javascript">

    $(function(){

        $(document).on('click', '.info-item', function(){

            var url = $(this).attr('data-url');
            window.location.href = url;

        });

    })

  </script>

  <!--BODY CONTENT START-->
  <div id="category">


    <div class="container">

    <div class="row">
        <div class="col-lg-12 category_head ">
            <h1><?php echo lang('auto.explore_directory_category')?></h1>
            <h5><?php echo lang('auto.explore_sub_head')?></h5>
        </div>
    </div>

  <!--CATEGORY TAB SECTION-->
  <!--NAV-->
  <div class="row tab_section visible-lg-block">

  	 <div class="tabs">
     <nav class="nav-collapse">
      <ul class="opts-category">
            <li>

              <a href="all" class="active" onclick="$('#load-category-slide').animatescroll({padding:300,easing:'easeInBack'}); return false;">
                <?php echo lang('auto.all_category')?>
              </a>

            </li>

           <?php foreach($category AS $key => $value):?>
              <li><a href="<?php echo $value->id_category?>" onclick="$('#load-category-slide').animatescroll({padding:300,easing:'easeInBack'}); return false;"><?php echo $value->{name_.$lan}?></a></li>
           <?php endforeach;?>

        </ul>

        <script type="text/javascript">

          $(function(){


              //Trigger the click event of first element in menu
              $.get('<?php echo HOST_URL?>/async/view_category/all',function(res){
                  $('#load-category-slide').html(res);
                });

              $(document).on('click','.opts-category li a', function(){

                var elem = $(this),
                  loadURL = $(this).attr('href'),
                  ajxLoad = $('#load-category-slide');

                $('.opts-category li a').removeClass('active');
                ajxLoad.html('');
                ajxLoad.addClass('loader');

                $.get('<?php echo HOST_URL?>/async/view_category/'+loadURL,function(res){
                  ajxLoad.removeClass('loader');
                  ajxLoad.html(res);
                  elem.addClass('active');
                });

                return false;

              });

              $(document).on('click','#toggle-menu', function(){

                  $('.menu-category-sm').slideToggle();

              });

              $(document).on('click','.menu-category-sm > ul li a', function(){

                  $('.menu-category-sm').slideToggle();

              });

          })

        </script>

      </nav>
     </div>
  </div>
  <!--NAV-->

  <div class="tabs visible-xs-block visible-md-block visible-xs-block">
    <button id="toggle-menu" class="closed"><?php echo lang('auto.category')?><span class="caret"></span></button>
    <nav class="nav-collapse menu-category-sm">

        <ul class="opts-category">
            <li>

              <a href="all" class="active" onclick="$('#load-category-slide').animatescroll({padding:300,easing:'easeInBack'}); return false;">
                <?php echo lang('auto.all_category')?>
              </a>

            </li>

            <?php foreach($category AS $key => $value):?>
                <li>
                  <a href="<?php echo $value->id_category?>" onclick="$('#load-category-slide').animatescroll({padding:300,easing:'easeInBack'}); return false;"><?php echo $value->{name_.$lan}?></a>
                </li>
            <?php endforeach;?>

        </ul>

    </nav>

  </div>

  <div class="row" id="load-category-slide">


  </div>
 </div>
  <!--CATEGORY TAB SECTION-->
  </div>


  <?php if($dataLeaderBoardAd):?>
  <div id="add">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 center-block text-center">
          	<a href="<?php echo prep_url($dataLeaderBoardAd->url);?>" target="_blank">
              <img src="<?php echo ADS_SHOW_PATH.$dataLeaderBoardAd->image;?>"/>
            </a>
          </div>
      </div>
  </div>
  </div>
  <?php endif;?>



  <div id="article">
  	<div class="container">
    	<div class="row">
<!--        	ARTICLE-->

          <?php if($articles):?>
        	<div class="col-lg-7 article ">
            	<div class="row aricle_head">
                    <div class="col-lg-10">
                        <h1><?php echo lang('auto.latest_article')?></h1>
                     </div>
                     <div class="col-lg-2 pull-right">
                     <a href="<?php echo HOST_URL?>/articles/" class="article_button pull-right"><?php echo lang('auto.view_all')?></a>
                     </div>
                 </div>

                 <div class="row aricle_content">

                    <?php foreach($articles AS $key => $value):?>

                      <?php if($value->{title_.$lan} != NULL && $value->{title_.$lan} != ''):?>
                      <div class="col-lg-6">

                            <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id);?>">
                        	   <img src="<?php echo ARTICLES_SHOW_PATH.$value->image?>" alt="">
                            </a>

                            <h1 title="<?php echo $value->{title_.$lan};?>"><?php echo character_limiter($value->{title_.$lan}, 30, '...')?></h1>
                            <p><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 80, '...');?></p>
                            <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id);?>" class="article_content_button"><?php echo lang('auto.read_more')?></a></LI>
                      </div>
                      <?php endif;?>

                   <?php endforeach;?>

                 </div>
            </div>
 <!--        	ARTICLE END-->

        <?php endif;?>

<!-- NEWS-->
          <?php if($dataNews):?>
            <div class="col-lg-5 news">

            	<div class="row news_head">
                    <div class="col-lg-8">
                        <h1><?php echo lang('auto.latest_news')?></h1>
                     </div>
                     <div class="col-lg-4 pull-right">
                     <a href="<?php echo HOST_URL?>/news" class="article_button pull-right"><?php echo lang('auto.view_all')?></a>
                     </div>
                 </div>

                 <?php foreach($dataNews AS $key => $value):?>
                  <?php if($value->{news_title_.$lan} != NULL && $value->{news_title_.$lan} != ''):?>
                  <div class="row ">
                    <div class="col-lg-12 news_content">

                      <a href="<?php echo HOST_URL?>/news/details/<?php echo $this->encrypt->encode($value->news_id);?>">
                        <img src="<?php echo NEWS_SHOW_PATH.$value->image?>" alt="">
                      </a>

                      <h1><?php echo character_limiter($value->{news_title_.$lan}, 100, '...');?></h1>
                      <p class="visible-lg-block"><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 80, '...');?></p>
                      <a href="<?php echo HOST_URL?>/news/details/<?php echo $this->encrypt->encode($value->news_id);?>" class="article_content_button"><?php echo lang('auto.read_more')?></a>
                    </div>
                  </div>
                  <?php endif;?>
                 <?php endforeach;?>

                 </div>

            </div>
             <!-- NEWS end-->

             <?php endif;?>

        </div>
    </div>
  </div>
