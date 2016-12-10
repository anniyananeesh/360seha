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
 
  <?php if($records):?>
  <div id="article">
  	<div class="container">
    	<div class="row">
<!--        	ARTICLE-->
        	<div class="col-lg-12 article ">
            	<div class="row aricle_head">
                    <div class="col-lg-12">
                        <h1><?php echo lang('auto.health_articles')?></h1>
                     </div>
                 </div>
                
                 <div class="row aricle_content">

                  <?php foreach($records AS $key => $value):?>

                    <?php if($value->{title_.$lan} != NULL && $value->{title_.$lan} != ''):?>
                    <div class="col-lg-3 art_list">
                      	  <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id)?>">
                            <img src="<?php echo ARTICLES_SHOW_PATH.$value->image?>" alt="">

                          <h1><?php echo character_limiter($value->{title_.$lan}, 100, '...')?></h1>
                          <p><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 80, '...')?></p>
                          </a>
                          <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id)?>" class="article_content_button"><?php echo lang('auto.read_more')?></a>
                    </div>
                    <?php endif;?>
                    
                  <?php endforeach;?>
                 
                 </div>
            </div>

        </div>
    </div>
  </div>

  <?php endif;?>


  <?php if($dataLeaderBoardAd):?>
 
  <div id="add">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 center-block text-center">
            <a href="<?php echo prep_url($dataLeaderBoardAd->url);?>" target="_blank">
              <img src="<?php echo ADS_SHOW_PATH.$dataLeaderBoardAd->image;?>" style="width: 100%; max-width: 728px;"/>
            </a>
          </div>
      </div>
  </div>
  </div>
  <?php endif;?>

