<!--SLIDER-->
      <div id="inner_slider">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">

                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <?php if($dataLeaderBoardAd):?>
                          <div class="carousel-inner" role="listbox">
                           
                              <div class="item active">

                                  <div class="col-lg-12 col-sm-12 nopads">
                                      <a href="<?php echo prep_url($dataLeaderBoardAd->url);?>" target="_blank">
                                        <img src="<?php echo ADS_SHOW_PATH.$dataLeaderBoardAd->image;?>" style="width: 100%; max-width: 728px;"/>
                                      </a>
                                  </div>
                              </div>
                              
                          </div>
                          <?php endif;?>
                     
                     </div>
                     
                     
                  </div>
              </div>
          </div>
      </div>
  <!--SLIDER-->
  
  <!--BODY CONTENT START-->
  <div id="about">
  	<div class="container">
    	<div class="row">
        	
            <div class="col-lg-12">
            	<!-- <h1 class="block text-center"><?php echo lang('auto.find_the_best_offers')?></h1> -->
              <a href="#" id="detectMobileHandset" class="row block text-center">
                <img src="<?php echo IMG_PATH?>/<?php echo ($lan == 'en') ? 'offer-poster.jpg' : 'offers-ar.jpg';?>" class="img-responsive" style="max-width: 695px!important;display: inline;"/>
              </a>
                
            </div>

        </div>
    </div>
  </div>
  
  <!--BODY CONTENT  END-->
  <script type="text/javascript">
 
      $(function(){

        $(document).on('click','#detectMobileHandset',function(){
 
          if (isMobile.apple.phone || isMobile.apple.ipod || isMobile.apple.tablet)
          {
              window.location.href = "https://itunes.apple.com/us/app/360seha/id1018589032?l=ar&ls=1&mt=8";             
          }

          if (isMobile.android.phone || isMobile.android.tablet)
          {
              window.location.href = "https://play.google.com/store/apps/details?id=seha.id";             
          }

          return false;

        });

      })
  </script>