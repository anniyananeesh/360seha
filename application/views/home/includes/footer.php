<?php

    $CI = & get_instance();
    $CI->load->model(SITE_MODELS."country_model", 'countryModelAlias');
    $country = $CI->countryModelAlias->fetchFields(array('name_en','name_ar','id','domain_url'),array(), array('orderby'=>'ASC'));
?>

<!--BODY CONTENT  END-->
  <!--FOOTER TOP-->
 <div id="footertop">

    <div class="container">
    	<div class="row">

            <?php if(!empty($country)):?>
        	<div class="col-lg-6 foot1">
            	<img src="<?php echo IMG_PATH?>/logo.svg" alt="" width="200">

                <?php if($this->publicConfig["maintenance"]["value"] != 1):?>
                <ul>
                    <?php foreach($country AS $key => $value):?>
                	<li><a href="<?php echo prep_url($value->domain_url)?>"> <?php echo $value->{name_.$lan}?></a></li>

                    <?php echo (!empty($country[$key+1]->id)) ? '<li> l    </li>': ''?>
                    <?php endforeach;?>

                </ul>
                <?php endif;?>
                <p>For online queries :- <a href="mailto:<?php echo INFO_EMAIL?>"><?php echo INFO_EMAIL?></a></p>

            </div>
            <?php endif;?>

            <div class="col-lg-3 foot2 social">
            	<h1><?php echo lang('auto.follow_us_on')?></h1>
                <ul>
                	<li><a href="https://www.facebook.com/360seha" target="_blank"><img src="<?php echo IMG_PATH?>/social3.svg" alt=""></a></li>
                    <li><a href="https://www.twitter.com/360seha" target="_blank"><img src="<?php echo IMG_PATH?>/social4.svg" alt=""></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo IMG_PATH?>/social1.svg" alt=""></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo IMG_PATH?>/social2.svg" alt=""></a></li>
                    <li><a href="#" target="_blank"><img src="<?php echo IMG_PATH?>/social5.svg" alt=""></a></li>
                </ul>
            </div>
            <div class="col-lg-3 foot3 social">
            	<h1><?php echo lang('auto.download_app')?> </h1>
                <ul>
                	<li><a href="https://itunes.apple.com/us/app/360seha/id1018589032?mt=8" target="_blank"><img src="<?php echo IMG_PATH?>/apple.svg" alt=""></a></li>
                    <li><a href="https://play.google.com/store/apps/details?id=seha.id" target="_blank"><img src="<?php echo IMG_PATH?>/google.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>

 </div>

  <!--FOOTER TOP END-->
 <div id="footerbottom">
 	<div class="container">
    	<div class="row">
        	<div class="col-lg-7 bottom_menu">
              <?php if($this->publicConfig["maintenance"]["value"] != 1):?>
            	<ul>
                	<li><a href="<?php echo HOST_URL?>/about"><?php echo lang('auto.about_us')?> </a></li>
                     <li>  l  </li>
                    <li><a href="<?php echo HOST_URL?>/terms"><?php echo lang('auto.terms_of_use')?> </a> </li>
                    <li>l  </li>
                    <li><a href="<?php echo HOST_URL?>/privacy_policy"><?php echo lang('auto.privacy_policy')?> </a> </li>
                   <li> l</li>
                   <li><a href="<?php echo HOST_URL?>/news"> <?php echo lang('auto.news')?>    </a> </li>
                   <li> l   </li>
                    <li><a href="<?php echo HOST_URL?>/articles"><?php echo lang('auto.articles')?>   </a>  </li>
                    <li>l  </li>
                   <li> <a href="<?php echo HOST_URL?>/contact"><?php echo lang('auto.contact_us')?>  </a> </li>
                </ul>
            	 <?php endif;?>
            </div>
            <div class="col-lg-5 pull-right foot_botom_copy">
            	<p>Copyright 2016 . © All rights reserved 360seha.com</p>
            </div>
        </div>
    </div>

  </div>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo JS_PATH?>/bootstrap.min.js"></script>

  <script type="text/javascript">

      $(function(){

            $('[data-toggle="tooltip"]').tooltip();

      })

  </script>

  <script type="text/javascript" src="<?php echo JS_PATH?>/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>/jquery.elastislide.js"></script>
      <script type="text/javascript" src="<?php echo JS_PATH?>/gallery.js"></script>
<!--GALLERY-->
<!--READMORE-->
  <script src="<?php echo JS_PATH?>/readmore.js"></script>

  <script>
    $('#info').readmore({
      moreLink: '<a href="#">Usage, examples, and options</a>',
      collapsedHeight: 384,
      afterToggle: function(trigger, element, expanded) {
        if(! expanded) { // The "Close" link was clicked
          $('html, body').animate({scrollTop: element.offset().top}, {duration: 100});
        }
      }
    });

    $('article').readmore({speed: 600});
  </script>

  </body>
  </html>
