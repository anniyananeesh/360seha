    <!--VIDEO-->
    <link href="<?php echo ASSETS_PATH?>/ninja/thumbs.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS_PATH?>/ninja/ninja-slider.css" rel="stylesheet" type="text/css" />
    <!--ninjaVideoPlugin.js is required only when the slider contains video or audio.-->
    <script src="<?php echo ASSETS_PATH?>/ninja/ninjaVideoPlugin.js"></script>
    <script src="<?php echo ASSETS_PATH?>/ninja/ninja-slider.js" type="text/javascript"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo BOWER_PATH?>/custombox/dist/custombox.min.css"/>
    <script type="text/javascript" src="<?php echo BOWER_PATH?>/custombox/dist/legacy.min.js"></script>
    <script type="text/javascript" src="<?php echo BOWER_PATH?>/custombox/dist/custombox.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>/jquery.sticky.min.js"></script>
    <!--<script type="text/javascript" src="http://leafo.net/sticky-kit/src/sticky-kit.js"></script>VIDEO-->
    <!--GALLERY-->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH?>/elastislide.css" />
    <noscript>
      <style>
        .es-carousel ul{
          display:block;
        }
      </style>
    </noscript>
    <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">
      <div class="rg-image-wrapper">
        {{if itemsCount > 1}}
          <div class="rg-image-nav">
            <a href="#" class="rg-image-nav-prev">Previous Image</a>
            <a href="#" class="rg-image-nav-next">Next Image</a>
          </div>
        {{/if}}
        <div class="rg-image"></div>
        <div class="rg-loading"></div>
        <div class="rg-caption-wrapper">
          <div class="rg-caption" style="display:none;">
            <p></p>
          </div>
        </div>
      </div>
    </script>
<!--GALLERY-->


<!--BODY CONTENT START-->
<div id="profile">
<div class="container">
<div class="row">

<!--LEFT BODY-->
<div class="col-lg-4 col-md-6" id="sidebar">
  <div class="Profile_card">

      <?php if($profileData->account_type != 3):?>
          <div class="Profile_card_img" style="background: url('<?php echo ($profileData->image == NULL) ? SUBS_IMAGE_SHOW_PATH.$profileData->subs_profile_img : SUBS_PHOTO_SHOW_PATH.$profileData->image?>') no-repeat; background-size: cover;"></div>
      <?php endif;?>

      <h1 <?php echo ($profileData->account_type == 3) ? 'style="padding-top: 45px;"' : '';?>><?php echo $profileData->{title_.$lan}?></h1>
      <p class="para-location">  <?php echo $profileData->{address1_.$lan}?>, <?php echo $profileData->{address2_.$lan}?></p>
      <p class="para-phone">  <?php echo $profileData->subs_primary_contact?></p>
      <p class="para-email"> <a href="mailto:<?php echo $profileData->subs_email?>"> <?php echo $profileData->subs_email?></a></p>

      <?php if(!empty($menuAccess) && in_array('timings', $menuAccess)):?>

          <?php if(!empty($openCloseTimings)):?>
          <h2><?php echo lang('auto.opening_hours')?></h2>
          <p class="para-time">
                <?php echo lang('auto.today')?><br>
                <?php foreach($openCloseTimings AS $key => $value):?>
                    <?php echo date('h:i A', strtotime($value->open_time))?> - <?php echo date('h:i A', strtotime($value->close_time))?>
                    <?php echo (isset($openCloseTimings[$key+1])) ? ', <br/>' : ''?>
                <?php endforeach;?>
          </p>
          <?php endif;?>

      <?php endif;?>

      <?php if(!empty($socialMedia)):?>
      <ul>
          <?php if($socialMedia->social_fb_link != NULL):?>
            <li><a href="<?php echo prep_url($socialMedia->social_fb_link);?>" target="_blank"><img src="<?php echo IMG_PATH?>/social_1.png" alt=""></a></li>
          <?php endif;?>

          <?php if($socialMedia->social_tweet_link != NULL):?>
            <li><a href="<?php echo prep_url($socialMedia->social_tweet_link);?>" target="_blank"><img src="<?php echo IMG_PATH?>/social_2.png" alt=""></a></li>
          <?php endif;?>

          <?php if($socialMedia->social_linked_in != NULL):?>
            <li><a href="<?php echo prep_url($socialMedia->social_linked_in);?>" target="_blank"><img src="<?php echo IMG_PATH?>/social_3.png" alt=""></a></li>
          <?php endif;?>

          <?php if($socialMedia->social_ytube_link != NULL):?>
            <li><a href="<?php echo prep_url($socialMedia->social_ytube_link);?>" target="_blank"><img src="<?php echo IMG_PATH?>/social_4.png" alt=""></a></li>
          <?php endif;?>

          <?php if($socialMedia->social_inst_link != NULL):?>
            <li><a href="<?php echo prep_url($socialMedia->social_inst_link);?>" target="_blank"><img src="<?php echo IMG_PATH?>/social_5.png" alt=""></a></li>
          <?php endif;?>

      </ul>
      <?php endif;?>

      <button class="Profile_card_button sendMessage" id="sendMessage"><?php echo lang('auto.send_message')?></button>
      <button id="toggle" class="about">MORE ABOUT <span class="caret"></span></button>

      <script type="text/javascript">

                function callUser(tel)
                {
                  window.location.href = 'tel:' + tel;
                }

                $(function(){

                        $("#sendAppointment").on('click',function(evt){

                          Custombox.open({
                              target: '<?php echo HOST_URL?>/async/appointment/<?php echo $this->encrypt->encode($profileData->user_id)?>',
                              effect: 'fadein',
                              width: 450
                          });

                          evt.preventDefault();

                        });

                        $(".sendMessage").on('click',function(evt){

                          Custombox.open({
                              target: '<?php echo HOST_URL?>/async/send_message/<?php echo $this->encrypt->encode($profileData->user_id)?>',
                              effect: 'fadein',
                              width: 450
                          });

                          evt.preventDefault();

                        });

                        var windowWidth = $(window).width(),
                          collapsedHeight = (windowWidth <= 480) ? 200 : 450;

                        $('.profile-about').readmore({
                    speed: 75,
                    collapsedHeight: collapsedHeight,
                    moreLink:  '<a href="#" class="normal text-blue"><?php echo lang('auto.read_more')?></a>',
                    lessLink: '<a href="#" class="normal text-blue"><?php echo lang('auto.read_less')?></a>'
                  });

                })

              </script>

  </div>
</div>

 <!--SIDE SECTION END-->

 <script type="text/javascript">

   $(function(){

      $('#sidebar').hcSticky({});

   })

 </script>

<div class="col-lg-8" style="background: #fff;">

    <?php if(!empty($photos) && (!empty($menuAccess) && in_array('photos', $menuAccess))):?>

    <!--GALLERY-->
    <div class="row">
    	<div class="col-lg-12 gallery">


        <div id="rg-gallery" class="rg-gallery">

					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
							<div class="es-carousel">
								<ul>

                    <?php foreach($photos AS $key => $value):?>
  									<li>
                        <a href="#">
                          <img src="<?php echo PHOTOS_SHOW_PATH . 'thumbs/' . $value->data;?>" data-large="<?php echo PHOTOS_SHOW_PATH . $value->data;?>" alt="image0<?php echo ++$key?>"/>
                        </a>
                    </li>
                    <?php endforeach;?>

								</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->


        </div>
    </div>
    <!--GALLERY END-->
    <?php endif;?>


   <!-- ABOUT-->
    <div class="row about_section">
    	<div class="col-lg-12">
        	<article>
            <h1><?php echo lang('auto.about_us')?></h1>
            <?php echo ($profileData->{description_long_.$lan} != NULL && trim($profileData->{description_long_.$lan}) != '') ? $profileData->{description_long_.$lan} : lang('auto.welcome_to_profile') . $profileData->{title_.$lan}?>


            <!-- <?php //if(!empty($insurance) && (!empty($menuAccess) && in_array('insurance', $menuAccess))):?>
            <ul>
                <h3><?php echo lang('auto.insurance_we_accept')?></h3>
                <?php //foreach($insurance AS $key => $value):?>
                  <?php echo '<li>' . $value->{title_.$lan} . '</li>';?>
                <?php //endforeach;?>
            </ul>
            <?php //endif;?>-->

            <?php if(!empty($departments)):?>
            <div class="tagcloud01">

            	<ul>

                <?php foreach ($departments as $key => $value):?>
            		    <li><a href="<?php echo HOST_URL?>/search/?country=&category=&_lat=&_lng=&_dt=&sort=unfeatured&specialization=<?php echo $value->id?>&city=&he=N"><?php echo $value->{title_.$lan}?></a></li>
                <?php endforeach;?>

              </ul>

            </div>
            <?php endif;?>

			</article>
        </div>
    </div>
    <!-- ABOUT END-->

    <?php if(!empty($videos) && (!empty($menuAccess) && in_array('videos', $menuAccess))):?>
     <!--VIDEO start-->
    <div class="row video">
    	<div class="col-lg-12">
        	<h1><?php echo lang('auto.video_gallery')?></h1>

                <div id="ninja-slider">
                    <div class="slider-inner">
                        <ul>

                            <?php foreach($videos AS $key => $value):?>

                            <li>
                                <div class="video">
                                    <iframe src="<?php echo 'http://www.youtube.com/embed/'.$value->data;?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </li>

                            <?php endforeach;?>

                        </ul>
                    </div>


                    <?php if(!empty($videos) && count($videos) > 1):?>
                    <div id="thumbs">

                        <?php foreach($videos AS $key => $value):?>
                            <?php $imagePath = ($value->has_thumb == 1 && $value->has_thumb != NULL) ? VIDEOS_SHOW_PATH.$value->thumb_url : $value->thumb_url;?>
                            <span onclick="nslider.displaySlide(<?php echo (int) $key;?>)"><img src="<?php echo $imagePath;?>"/></span>
                        <?php endforeach;?>

                    </div>
                    <?php endif;?>

                </div>



        </div>
    </div>
     <!--VIDEO end-->
     <?php endif;?>

   <!-- MAP-->
    <div class="row video">
    	<div class="col-lg-12">
        	<h1><?php echo lang('auto.reach_us')?></h1>
           <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAsY6fZX-WZ1pov5hm22wEr4Ho9ksHeBV4&q=<?php echo $profileData->latitude?>,<?php echo $profileData->longitude?>&zoom=18&maptype=roadmap" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <!-- MAP-->

    <div class="row review">
    	<div class="col-lg-12 text-center">
        	<h2><?php echo lang('auto.share_your_experience')?></h2>
            <h1><?php echo ucfirst($profileData->{title_.$lan})?></h1>
            <p><?php echo lang('auto.review_sub_title')?></p>
            <button type="button" id="addReview"><?php echo lang('auto.add_review')?></button>
        </div>
    </div>

    <script type="text/javascript">

      $(function(){

        $(document).on('click', '#addReview', function(evt){

          Custombox.open({
            target: '<?php echo HOST_URL?>/async/add_review/<?php echo $this->encrypt->encode($profileData->user_id)?>',
            effect: 'fadein',
            width: 450
          });

          evt.preventDefault();
        })
      })

    </script>

 	</div>

</div>
</div>
</div>
<!--BODY CONTENT  END-->
