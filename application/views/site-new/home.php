<!doctype html>
<html dir="<?php echo ($lan == 'ar') ? 'rtl': 'ltr'; ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="digitallgateweb.com" />
<title><?php echo lang('auto.site_title')?></title>
<link rel="stylesheet" href="<?php echo CSS_PATH?>/home/style_<?php echo $lan;?>.css">
<link rel="stylesheet" href="<?php echo CSS_PATH?>/home/responsive_<?php echo $lan;?>.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<!-- Bootstrap  -->
<link rel="stylesheet" href="<?php echo CSS_PATH?>/home/bootstrap.min.css">
</head>

<body>

<style type="text/css">

  .closeInfoItem
  {
    position: absolute!important;
    top: 20px!important;
    right: 40px!important;
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

<div id="wraper">
<div id="container_body">

    <!--TOGGLE-->
    <div class="menu-opener">
      <div class="menu-opener-inner">&nbsp;</div>
    </div>
    <!--TOGGLE-->

  <!--LOGO-->
  <div class="logo">

         <div class="language">
              <ul>
                  <?php if($lan == 'ar'):?>
                    <LI><a href="<?php echo HOST_URL?>/lang/en">EN</a></LI>
                  <?php else:?>
                    <li><a href="<?php echo HOST_URL?>/lang/ar">AR</a></li>
                  <?php endif;?>
              </ul>
          </div>

  </div>
  <div class="clearfix"></div>
  <!--NEWS-->
  <?php if($dataNews):?>
  <div class="news">
    <div class="marquee">
      <?php foreach ($dataNews as $key => $value):?>
        <p><a target="_blank" href="<?php echo HOST_URL?>/news/details/<?php echo $this->encrypt->encode($value->news_id);?>"><?php echo $value->{news_title_.$lan}?></a></p>
      <?php endforeach;?>
    </div>
  </div>
  <?php endif;?>

  <!--RIGHT PORTION-->

  <div class="right_nav">

    <!--ARTICLE-->
    <div class="article"> <a href="<?php echo HOST_URL?>/articles/">
      <h2><?php echo lang('auto.health_articles')?></h2>
      </a>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

          <?php foreach($articles AS $key => $value):?>
          <div class="item <?php echo ($key == 0) ? 'active' : '';?>">
            <div class="article-image" style="background: url('<?php echo ARTICLES_SHOW_PATH.$value->image?>') no-repeat 50% 50%; background-size: cover;"></div>
            <h3><?php echo character_limiter($value->{title_.$lan}, 30, '...')?></h3>
            <p><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 70, '...');?> <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id);?>">READ MORE</a></p>
          </div>
          <?php endforeach;?>

        </div>
      </div>
    </div>
    <!--ARTICLE-->

    <!--AD-->
    <?php if($banner_side):?>

        <div class="ad_side">
            <a href="<?php echo prep_url($banner_side->url);?>" target="_blank">
              <img src="<?php echo base_url();?>uploads/ads/<?php echo $banner_side->image?>"/>
            </a>
        </div>

    <?php endif;?>
    <!--AD END-->
  </div>

  <!--FOOTER-->
  <div class="download">
    <ul>
      <li><a href="https://itunes.apple.com/us/app/360seha/id1018589032?mt=8" target="_blank"><img src="<?php echo IMG_PATH?>/home/apple.png"></a></li>
      <li><a href="https://play.google.com/store/apps/details?id=com.dgweb.seha" target="_blank"><img src="<?php echo IMG_PATH?>/home/playstore.png"></a></li>
    </ul>
  </div>
  <div class="category menu">
    <ul>
      <li><a href="<?php echo HOST_URL?>/search/?country=&city=&v=featured&sort=featured&q=&category=528"><img src="<?php echo IMG_PATH?>/home/clinic.png"><br>
        <?php echo lang('auto.clinic')?></a></li>
      <li><a href="<?php echo HOST_URL?>/search/?country=&city=&v=featured&sort=featured&q=&category=37"><img src="<?php echo IMG_PATH?>/home/medical-center.png"><br>
        <?php echo lang('auto.medical_center')?></a></li>
      <li><a href="<?php echo HOST_URL?>/search/?country=&city=&v=featured&sort=featured&q=&category=38"><img src="<?php echo IMG_PATH?>/home/hospital.png"><br>
        <?php echo lang('auto.hospital')?></a></li>
      <li><a href="<?php echo HOST_URL?>/search/?country=&city=&v=featured&sort=featured&q=&category=39"><img src="<?php echo IMG_PATH?>/home/pharmacy.png"><br>
        <?php echo lang('auto.pharmacy')?></a></li>
      <li><a href="<?php echo HOST_URL?>/search/?country=&city=&v=featured&sort=featured&q=&category=40"><img src="<?php echo IMG_PATH?>/home/labs.png"><br>
        <?php echo lang('auto.labs')?></a></li>
    </ul>
  </div>
  <div class="social">
    <ul>
      <li><a href="https://www.twitter.com/360seha"><img src="<?php echo IMG_PATH?>/home/twitter.png"></a></li>
      <li><a href="https://www.facebook.com/360seha"><img src="<?php echo IMG_PATH?>/home/facebook.png"></a></li>
      <li><a href="https://www.instagram.com/360seha"><img src="<?php echo IMG_PATH?>/home/instagram.png"></a></li>
    </ul>
  </div>
  <!--FOOTER-->

</div>

<!-- MAIN JS -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo JS_PATH?>/home/bootstrap.min.js"></script>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyDA3Is0CNRYaS-ZnYRzeJA-UtNxNtBJjao"></script>
<script src="<?php echo USER_JS_PATH?>/maplace.js"></script>
<script src="<?php echo USER_JS_PATH?>/infobox.js"></script>
 

<script src="<?php echo JS_PATH?>/home/main.js"></script>

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
        "apple"     : [{"featureType":"all","elementType":"geometry.fill","stylers":[{"hue":"#0080ff"},{"saturation":"250"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"hue":"#0080ff"},{"saturation":"100"},{"lightness":"-33"},{"gamma":"1.33"},{"weight":"3.86"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"saturation":"100"},{"lightness":"-2"},{"visibility":"on"},{"hue":"#00adff"},{"gamma":"0.84"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"hue":"#0080ff"},{"saturation":"57"}]},{"featureType":"landscape","elementType":"labels.icon","stylers":[{"color":"#ff0303"},{"saturation":"100"},{"lightness":"-53"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"hue":"#0080ff"},{"saturation":"94"},{"lightness":"24"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"hue":"#0080ff"},{"saturation":"92"},{"lightness":"4"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"hue":"#0080ff"},{"saturation":"100"},{"lightness":"4"}]},{"featureType":"transit","elementType":"geometry.fill","stylers":[{"hue":"#0080ff"}]}]
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


                LocationsArr = (r.code == 200) ? json2array(r.data) : [];

                if(r.code == 200)
                {
                    var maplace = new Maplace({

                      locations: (r.code == 200) ? LocationsArr : [],
                      map_options: {
                        streetViewControl: false,
                        mapTypeControl: false,
                        styles: theme_array["apple"],
                        zoom: 14,
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
                      map_div: '#map-canvas',
                      markerClick: function(index, location, marker){
                          console.log(marker);
                          getUserInfoWindow(marker.user);
                      }

                  });

              }else {

                    var maplace = new Maplace({

                      map_options: {
                        streetViewControl: false,
                        mapTypeControl: false,
                        styles: theme_array["apple"],
                        zoom: 14,
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
                      map_div: '#map-canvas',
                      markerClick: function(index, location, marker){
                          console.log(marker);
                          getUserInfoWindow(marker.user);
                      }

                  });

              }

                //position.coords.longitude
                var MyLocation = [{
                  lat: lat,
                  lon: long,
                  icon: '<?php echo base_url();?>themes/default/assets/img/ic_locate.png'
                }];

                maplace.AddLocations(MyLocation);
                maplace.Load({
                  map_options: {set_center: [lat,long], zoom: 14, mapTypeId:google.maps.MapTypeId.ROAD, tilt: 45}
                });

                maplace.Load();

        }, 'json');

    }

    function getUserInfoWindow(userId)
    {
        var loader = $('.loader'), infowindow = $('.info-async-window');
        loader.removeClass('hidden').addClass('open');
        infowindow.removeClass('open').addClass('hidden');

        $.get('<?php echo base_url()?>async/getUserInfoWindow/' + userId, function(res){

          if(res.code == 200)
          {
            loader.removeClass('open').addClass('hidden');
            infowindow.removeClass('hidden').addClass('open');

            infowindow.html(res.html);

          }else {
            alert("Error reading...");
          }

        }, 'json');
    }

    $(document).on('click','.info-close', function(e){

        $('.info-async-window').removeClass('open').addClass('hidden');

    });

  </script>
  <!--/map-->

<div id="map-canvas"></div>
</div>

<div class="loader hidden"></div>
<div class="info-async-window hidden"></div>

</body>
</html>
