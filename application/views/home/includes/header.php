<?php

    $CI = & get_instance();

    $CI->load->model(SITE_MODELS.'ads_model');
    $dataLeaderBoardAd = $CI->ads_model->fetchRowFields( array('image','url'), array('show_status'=>1,'ad_area'=>1),array('id' => 'RANDOM'));
    $dataSideBannerMob = $CI->ads_model->fetchRowFields( array('image','url'), array('show_status'=>1,'ad_area'=>2),array('id' => 'RANDOM'));
?>
<!DOCTYPE html>
  <html dir="<?php echo ($lan == 'ar') ? 'rtl': 'ltr'; ?>">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo lang('auto.site_title')?></title>

      <link href="<?php echo CSS_PATH?>/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo CSS_PATH?>/styles_<?php echo $lan?>.css" rel="stylesheet">
      <link href="<?php echo CSS_PATH?>/responsive.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
      <link href="<?php echo PLUGINS_PATH?>/sumoselect3/sumoselect.css" rel="stylesheet">

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo USER_JS_PATH?>/jquery.animatescroll.js"></script>
      <script type="text/javascript" src="<?php echo USER_JS_PATH?>/mobile.detect.min.js"></script>
      <script type="text/javascript" src="<?php echo PLUGINS_PATH?>/sumoselect3/jquery.sumoselect.min.js"></script>

      <script src="http://maps.google.com/maps/api/js?key=AIzaSyDA3Is0CNRYaS-ZnYRzeJA-UtNxNtBJjao"></script>
      <script src="<?php echo USER_JS_PATH?>/maplace.js"></script>
      <script src="<?php echo USER_JS_PATH?>/infobox.js"></script>

    </head>

  <body>

 <!--HEADER -->
  <div id="header">
      <div class="container">
          <div class="row">
              <!--LOGO-->
              <div class="col-lg-2 col-md-2 col-sm-5 logo">
                  <a href="<?php echo HOST_URL?>/"><img src="<?php echo IMG_PATH?>/logo.svg" alt="" width="200"></a>
                  <p>
                  <?php if($lan == 'ar'):?>
                    <a href="<?php echo HOST_URL?>/lang/en">EN</a>
                  <?php else:?>
                    &nbsp;<span><a href="<?php echo HOST_URL?>/lang/ar">AR</a></span>
                  <?php endif;?>
                  </p>
              </div>
              <!--LOGO-->

              <!--NAVIGATION-->
              <div class="col-lg-7">

                    <?php if($this->publicConfig["maintenance"]["value"] != 1):?>

                          <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                              </button>
                          </div>

                          <div class="mainmenu">
                                  <uL class="nav navbar-nav collapse navbar-collapse">
                                  <li><A href="<?php echo HOST_URL?>/"><?php echo lang('auto.home')?></A></li>
                                  <li><A href="<?php echo HOST_URL?>/about"><?php echo lang('auto.about_us')?></A></li>
                                  <li><A href="<?php echo HOST_URL?>/search/?country=&city=&category="><?php echo lang('auto.health_directory')?></A></li>
                                  <li><A href="<?php echo HOST_URL?>/news"><?php echo lang('auto.news')?></A></li>
                                  <li><A href="<?php echo HOST_URL?>/articles"><?php echo lang('auto.health_articles')?></A></li>
                                  <li><A href="<?php echo HOST_URL?>/contact"><?php echo lang('auto.contact_us')?></A></li>


                              </uL>

                          </div>

                    <?php endif;?>

                  </div>

              <!--NAV END-->
              <?php if($publicConfig['offer_label']['value'] == 'Y' && $this->publicConfig["maintenance"]["value"] != 1):?>
              <!--OFFER-->
              <div class="col-lg-1 offer">
                  <a href="<?php echo HOST_URL?>/offers"><img src="<?php echo IMG_PATH?>/offer-label-<?php echo $lan?>.svg" alt="" width="70"/></a>
              </div>
              <?php endif;?>

              <?php if($this->publicConfig["maintenance"]["value"] != 1):?>
              <div class="lg-2 login">
                  <ul>
                      <LI ><A href="<?php echo HOST_URL?>/signin"><?php echo lang('auto.signin')?></A></LI>
                      <LI class="listed"><A href="<?php echo HOST_URL?>/join"><?php echo lang('auto.add_your_company')?></A></LI>
                  </ul>
              </div>
              <?php endif;?>
              <!--OFFER END-->
          </div>
      </div>
  </div>
