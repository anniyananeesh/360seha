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
  <div id="article">
  	<div class="container">
    
    	<div class="row">
        	<div class="col-lg-9 article_details">
            	<h3><?php echo $article->{title_.$lan};?></h3>
                <!-- <p class="time">10 hrs ago</p> -->
                <?php if($article->image != NULL):?>
                  <div class="col-lg-12 row">
                    <img src="<?php echo ARTICLES_SHOW_PATH.$article->image?>" class="img-responsive">
                  </div>
                <?php endif;?>
                <br/>
                <div class="clearfix"></div>
                <div class="col-lg-12 row article-description">
                  <?php echo $article->{description_.$lan};?>
                </div>
                
            </div>

<!--        	ARTICLE-->


        	<div class="col-lg-3 article ">

              <?php if($dataSideBannerMob):?>
            	<!--ADD SECTION-->
                <div class="row side_add">
                	  <div class="col-lg-12">
      				        <a href="<?php echo prep_url($dataSideBannerMob->url);?>" target="_blank">
                        <img src="<?php echo ADS_SHOW_PATH.$dataSideBannerMob->image;?>" width="100%"/>
                      </a>
                    </div>
                </div>

                <?php endif;?>

                <?php if(!empty($otherArticles)):?>
                <!--ADD SECTION-->
            	<div class="row aricle_head">
                    <div class="col-lg-10">
                        <h1><?php echo lang('auto.other_articles')?></h1>
                     </div>
                 </div>
                

                 <div class="row aricle_content">

                 <?php foreach($otherArticles AS $key => $value):?>
                 <div class="col-lg-12 art_list">
                    	<?php if($value->image != NULL):?>
                  <img src="<?php echo ARTICLES_SHOW_PATH.$value->image?>"/>
                <?php endif;?>
                        <h1><?php echo $value->{title_.$lan}?></h1>
                        <p><?php echo character_limiter((strip_tags(stripslashes($value->{description_.$lan}))) , 60, '...');?></p>
                        <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id)?>" class="article_content_button">Read more</a>
                 </div>
                 <?php endforeach;?>
                 
                 </div>
            </div>

            <?php endif;?>
 <!--        	ARTICLE END--> 

        </div>
    </div>
  </div>
  
  <!--BODY CONTENT  END-->
  
    

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