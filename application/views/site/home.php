<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <html dir="<?php echo ($lan == 'ar') ? 'rtl': 'ltr'; ?>">
  <head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo lang('auto.site_title')?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="digitallgateweb.com" />

      <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?php echo CSS_PATH?>/home/bootstrap.css">
      <link rel="stylesheet" href="<?php echo CSS_PATH?>/home/style_<?php echo $lan?>.css">

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

  </head>

  <body>

  <div id="fh5co-page" >


    <!--  HEADDER RESPONSIVE-->
              <div class=" fh5co-nav-toggle">

                  <a href="#" class="js-fh5co-nav-toggle"><i></i></a>
                  <img class="logo" src="<?php echo IMG_PATH?>/logo.svg" width="150" alt="360 seha">
                  <div class="menu-opener">
                    <div class="menu-opener-inner">&nbsp;</div>
                  </div>

              </div>

     <!--  HEADDER RESPONSIVE-->

              <aside id="fh5co-aside" role="complementary" class="js-fullheight text-center">
  				  <div class="language">
                      <ul>
                          <?php if($lan == 'ar'):?>
                            <LI><a href="<?php echo HOST_URL?>/lang/en"><?php echo lang('auto.lang_english')?></a></LI>
                          <?php else:?>
                            <li><a href="<?php echo HOST_URL?>/lang/ar"><?php echo lang('auto.lang_arabic')?></a></li>
                          <?php endif;?>
                      </ul>
                  </div>

                  <h1 id="fh5co-logo"><a href="<?php echo HOST_URL?>/"><img src="<?php echo IMG_PATH?>/logo.svg" width="200" alt="360 seha"></a></h1>

                  <?php if($publicConfig['offer_label']['value'] == 'Y' && $this->publicConfig["maintenance"]["value"] != 1):?>
                  <div class="offer">
                     <a href="<?php echo HOST_URL?>/offers"><img src="<?php echo IMG_PATH?>/offer-label-<?php echo $lan?>.svg" alt="" width="60"></a>
                  </div>
                  <?php endif;?>

                  <!--<button class="btn-offer">Get Offers</button>-->
                   <button class="btn-log" onclick="javascript: window.location.href='<?php echo HOST_URL?>/join'"><?php echo lang('auto.add_your_company')?></button>
                   <button class="btn-log" onclick="javascript: window.location.href='<?php echo HOST_URL?>/signin'"><?php echo lang('auto.signin')?></button>

              <nav id="fh5co-main-menu" role="navigation">
                  <ul>
                      <li><a href="<?php echo HOST_URL?>/about"><?php echo lang('auto.about_us')?></a></li>
                      <li><a href="<?php echo HOST_URL?>/search/?country=&city=&category="><?php echo lang('auto.health_directory')?></a></li>
                      <li><a href="<?php echo HOST_URL?>/articles"><?php echo lang('auto.health_articles')?></a></li>
                      <li><a href="<?php echo HOST_URL?>/news"><?php echo lang('auto.news')?></a></li>
                      <li><a href="<?php echo HOST_URL?>/contact"><?php echo lang('auto.contact_us')?></a></li>
                  </ul>
              </nav>
              <div class="download_head">
                  <h3><?php echo lang('auto.download_app')?></h3>
                  <ul>
                      <li><a href="https://itunes.apple.com/us/app/360seha/id1018589032?mt=8" target="_blank"><img src="<?php echo IMG_PATH?>/home/apple.png" alt=""></a></li>
                      <li><a href="https://play.google.com/store/apps/details?id=com.dgweb.seha" target="_blank"><img src="<?php echo IMG_PATH?>/home/playstore.png" alt=""></a></li>
                  </ul>
              </div>


              <div class="fh5co-footer">

                  <ul>
                      <li><a target="_blank" href="https://www.facebook.com/digitalgateweb" target="_blank"><img src="<?php echo IMG_PATH?>/home/facebook.png" alt></a></li>
                      <li><a href="#"><img src="<?php echo IMG_PATH?>/home/twitter.png" alt></a></li>
                      <li><a href="https://www.instagram.com/digitalgateweb" target="_blank"><img src="<?php echo IMG_PATH?>/home/instagram.png" alt></a></li>
                  </ul>
                  <ul>
                      <a href="<?php echo HOST_URL?>/terms"><li><?php echo lang('auto.terms_of_use')?></li></a>
                      <a href="<?php echo HOST_URL?>/privacy_policy"><li><?php echo lang('auto.privacy_policy')?></li></a>
                  </ul>
              <p><small><span>&copy; 2016 360seha.com. All Rights Reserved.</span>  </small></p>
              </div>

          </aside>
         </div>




        <!-- MAP AREA START-->
         <div id="fh5co-main">

              <div id="container_body" class="fh5co-narrow-content">

                      <div class="midbody text-center">

                         <div class="ad_top">

                              <?php if($banner_top):?>
                          		    <a href="<?php echo prep_url($banner_top->url);?>" target="_blank">
                          		        <img src="<?php echo base_url();?>uploads/ads/<?php echo $banner_top->image?>"/>
                          		    </a>
                          		<?php endif;?>

                              <?php if($dataNews):?>
                               <div class="marquee up">
                                  <div class="Head">
                                      <h3><?php echo lang('auto.news')?></h3>
                                  </div>

                                  <?php foreach ($dataNews as $key => $value):?>
                                    <p><a target="_blank" href="<?php echo HOST_URL?>/news/details/<?php echo $this->encrypt->encode($value->news_id);?>"><?php echo $value->{news_title_.$lan}?></a></p>
                                  <?php endforeach;?>
                              </div>
                              <?php endif;?>


                         </div>


                      </div>

                      <div class="bottom_search text-center">

                             <div class="ad_bottom menu">

                             <h2><img src="<?php echo IMG_PATH?>/home/search_icon.png"><?php echo lang('auto.find_health_around_you')?></h2>

                             <form action="<?php echo HOST_URL?>/search/" id="searchFrm" name="searchFrm" method="get">

                               <div class="form-group">
                                  <input type="hidden" name="country" id="country" value=""/>
                                  <input type="hidden" name="city" id="city" value=""/>
                                  <input type="hidden" name="v" id="v" value="featured"/>
                                  <input type="hidden" name="sort" id="sort" value="featured"/>
                                  <input type="text" class="form-control" placeholder="Enter Location / City / Town" name="q" id="q">
                                  <select class="form-control" name="category" id="category">
                                     <option value="">All Category ...</option>
                                     <?php foreach($category AS $key => $value):?>
                                        <option value="<?php echo $value->id_category?>"><?php echo $value->{name_.$lan}?></option>
                                     <?php endforeach;?>
                                  </select>
                               </div>

                             </form>

                          </div>

                     </div>

                      <div class="right-nav">

                              <button class="btn-danger" onclick="javascript: window.location.href='<?php echo HOST_URL?>/search/?country=&city=&category='"><?php echo lang('auto.health_directory')?></button>

                             <!--ARTICLE-->
                             <?php if($articles):?>
                              <div class="article">
                                  <a href="<?php echo HOST_URL?>/articles/"><h2><?php echo lang('auto.health_articles')?></h2></a>

                                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">

                                      <?php foreach($articles AS $key => $value):?>
                                      <div class="item <?php echo ($key == 0) ? 'active' : '';?>">
                                        <img  src="<?php echo ARTICLES_SHOW_PATH.$value->image?>" alt="Chania">
                                        <h3 title="<?php echo $value->{title_.$lan};?>"><?php echo character_limiter($value->{title_.$lan}, 30, '...')?></h3>
                                        <p><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 90, '...');?><a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id);?>">READ MORE</a></p>
                                      </div>

                                      <?php endforeach;?>

                                    </div>

                                  </div>

                              </div>
                              <?php endif;?>
                              <!--ARTICLE-->

                              <button onclick="javascript: window.location.href='<?php echo HOST_URL?>/advertise'" class="btn-advertise"><?php echo lang('auto.advertise_with_us')?></button>

                              <?php if($banner_side):?>

                                  <div class="ad_side">
                                      <a href="<?php echo prep_url($banner_side->url);?>" target="_blank">
                                        <img src="<?php echo base_url();?>uploads/ads/<?php echo $banner_side->image?>"/>
                                      </a>
                                  </div>

                          		<?php endif;?>

                       </div>


                   </div>


      <!--        FOR MAP BG-->

              <div id="map" class="map-canvas" style="background: url('<?php echo base_url();?>assets/home/img/ic_loader.svg') no-repeat 50% 50% #f0ede5;"></div>
          </div>
      </div>


      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

      <!-- jQuery Easing -->
      <script src="<?php echo JS_PATH?>/home/jquery.easing.1.3.js"></script>
      <script src="<?php echo JS_PATH?>/home/bootstrap.min.js"></script>


      <script src="<?php echo JS_PATH?>/home/owl.carousel.min.js"></script>
      <script src="<?php echo JS_PATH?>/home/jquery.stellar.min.js"></script>
      <script src="<?php echo JS_PATH?>/home/jquery.waypoints.min.js"></script>


      <script src="http://maps.google.com/maps/api/js?key=AIzaSyDA3Is0CNRYaS-ZnYRzeJA-UtNxNtBJjao"></script>
      <script src="<?php echo USER_JS_PATH?>/maplace.js"></script>
      <script src="<?php echo USER_JS_PATH?>/infobox.js"></script>

      <!-- MAIN JS -->
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
              "apple"     : [{"featureType":"all","elementType":"all","stylers":[{"hue":"#0074ff"},{"visibility":"on"}]},{"featureType":"poi.business","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}]
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
                            map_div: '#map'

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
                            map_div: '#map'

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

        </script>
        <!--/map-->

        <script type="text/javascript">

          $(function(){

              $(document).on('click', '.info-item', function(){
                  var url = $(this).attr('data-url');
                  window.location.href = url;
              });

              $(document).on('change', '#category', function(e){
                  e.preventDefault();
                  $('#searchFrm').submit();
             });

           });

        </script>
  </body>
  </html>
