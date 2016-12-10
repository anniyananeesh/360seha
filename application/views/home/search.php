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
  <div id="category">
    <div class="container">

       <div class="row">
         <div class=" col-lg-9 search">
              <form action="" method="get" class="nomargins" name="filterFrm" id="filterFrm">

              <input type="hidden" name="country" id="country" value="<?php echo (isset($_GET['country']) && $_GET['country'] != '') ? $_GET['country'] : '';?>" />

            <input type="hidden" name="category" id="category" value="<?php echo (isset($_GET['category']) && $_GET['category'] != '') ? $_GET['category'] : '';?>" />

            <input type="hidden" name="_lat" id="_lat" value="<?php echo (isset($_GET['_lat']) && $_GET['_lat'] != '') ? $_GET['_lat'] : '';?>" />
            <input type="hidden" name="_lng" id="_lng" value="<?php echo (isset($_GET['_lng']) && $_GET['_lng'] != '') ? $_GET['_lng'] : '';?>" />
            <input type="hidden" name="_dt" id="_dt" value="<?php echo (isset($_GET['_dt']) && $_GET['_dt'] != '') ? $_GET['_dt'] : '';?>" />
            <input type="hidden" name="sort" id="sort" value="unfeatured"/>

              <div class="row">

               <?php if(isset($_GET['category']) && ($_GET['category'] != 39 && $_GET['category'] != 40)):?>
               <div class="col-lg-4">
                 <label><?php echo lang('auto.specialization_in')?></label>
                 <select class="form-control" name="specialization" id="specialization">
                    <option value=""><?php echo lang('auto.choose')?></option>
                    <?php foreach($departments AS $key => $value):?>
                       <option value="<?php echo $value->id?>"><?php echo $value->{title_.$lan}?></option>
                    <?php endforeach;?>
                 </select>
                 <div class="clearfix"></div>

              </div>
              <?php endif;?>

              <div class="col-lg-3">
                <label><?php echo lang('auto.city')?></label>

                              <select class="form-control" name="city" id="city">
                                  <option value=""><?php echo lang('auto.choose')?></option>
                                  <?php foreach($city AS $key => $value):?>
                                    <option value="<?php echo $value->id?>" <?php echo (isset($_GET['city']) && $_GET['city'] == $value->id) ? 'selected' : '';?>><?php echo $value->{name_.$lan}?></option>
                                  <?php endforeach;?>
                              </select>
                              <div class="clearfix"></div>
              </div>

              <div class="col-lg-3">
                <label><?php echo lang('auto.emergency')?></label>
                  <select class="form-control" name="he" id="he">
                      <option value="N" <?php echo (isset($_GET['he']) && $_GET['he'] == 'N') ? 'selected' : '';?>><?php echo lang('auto.no')?></option>
                      <option value="Y" <?php echo (isset($_GET['he']) && $_GET['he'] == 'Y') ? 'selected' : '';?>><?php echo lang('auto.yes')?></option>
                 </select>
                 <div class="clearfix"></div>
              </div>


             </div>

         	<div class="row">
            	<div class="col-lg-12 text-center">
                	<button type="submit" class="form_button"><?php echo lang('auto.find_health')?></button>
                </div>
            </div>

         	</form>

         </div>

         <div class="col-lg-3 filter">

            <?php

              $url = $_GET;
              if(isset($url['sort'])){unset($url['_dt']);}
              $url = http_build_query($url);
            ?>

            <h1><?php echo lang('auto.search_filter_head')?></h1>
            <form>
            <div class="col-lg-12">
            <label><?php echo lang('auto.distance_within')?></label>
               <select class="form-control" name="_d" id="_d">
                <option><?php echo lang('auto.choose')?></option>
                <option value="5" <?php echo (isset($_GET['_dt']) && $_GET['_dt'] == '5') ? 'selected' : '';?>>5Kms</option>
                  <option value="10" <?php echo (isset($_GET['_dt']) && $_GET['_dt'] == '10') ? 'selected' : '';?>>10Kms</option>
                  <option value="15" <?php echo (isset($_GET['_dt']) && $_GET['_dt'] == '15') ? 'selected' : '';?>>15Kms</option>
                  <option value="20" <?php echo (isset($_GET['_dt']) && $_GET['_dt'] == '20') ? 'selected' : '';?>>20Kms</option>
            </select>
            <div class="clearfix"></div>
            </div>
            <div class="col-lg-12">
            <label>
        		<input type="checkbox" name="use_location" id="use_location" <?php echo ((isset($_GET['_lng']) && $_GET['_lng'] != '') && (isset($_GET['_lat']) && $_GET['_lat'] != '')) ? 'checked="checked"' : '';?>/> <?php echo lang('auto.use_my_location')?>
      		</label>
          <div class="clearfix"></div>
            </div>
            </form>
         </div>

      </div>

    <div class="row">
        <div class="col-lg-12 category_head ">
            <h1><?php echo lang('auto.explore_directory_category2')?></h1>
            <h5><?php echo lang('auto.explore_sub_head')?></h5>
        </div>
    </div>

  <?php if($subscribers):?>
  <!--CATEGORY TAB SECTION-->
<div class="row">
	<div class="col-lg-12 dropdown text-right pull-right">

          <?php

              $url = $_GET;
              if(isset($url['sort'])){unset($url['sort']);}
              $url = http_build_query($url);
          ?>


    	<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <?php echo (isset($_GET['sort']) && $_GET['sort'] != '') ?  lang('auto.sort_by') . ucfirst($_GET['sort']) : lang('auto.sort_by')?>
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?php echo HOST_URL.'/search/?'.$url?>&sort=featured"><?php echo lang('auto.featured')?></a></li>
                      <li><a href="<?php echo HOST_URL.'/search/?'.$url?>&sort=name"><?php echo lang('auto.name')?></a></li>
                      <li><a href="<?php echo HOST_URL.'/search/?'.$url?>&sort=date"><?php echo lang('auto.date')?></a></li>
                      <li><a href="<?php echo HOST_URL.'/search/?'.$url?>&sort=popularity"><?php echo lang('auto.popularity')?></a></li>
          </ul>
    </div>
</div>
<?php endif;?>


  <div class="row">

    <?php if($subscribers):?>


      <?php foreach($subscribers AS $key => $value):?>

        <div class="col-lg-3 col-md-6">
          	<div class="card">

                  <?php $photos = $this->modelPhotoAlias->fetchRowFields(array('img_url'), array('subscriber'=>$value->user_id), array('orderby'=>'ASC'));?>

                  <?php

                      if($photos)
                      {
                         $image = SUBS_PHOTO_SHOW_PATH.$photos->img_url;
                      }else if($photos->img_url != NULL){
                         $image = SUBS_IMAGE_SHOW_PATH.$value->subs_profile_img;
                      }else{
                         $image = IMG_PATH . '/home/noimage.jpg';
                      }

                  ?>

                  <?php if($value->account_type != 3):?>
                    <a href="<?php echo HOST_URL?>/<?php echo urlencode($value->subs_public_profile)?>" class="card-image" style="background: url('<?php echo $image;?>') no-repeat #ddd; background-size: cover;">
                    </a>
                  <?php else:?>
                    <a href="<?php echo HOST_URL?>/<?php echo urlencode($value->subs_public_profile)?>" class="card-image" style="background: url('<?php echo IMG_PATH?>/home/noimage.jpg') no-repeat 50% 50% #d6d6d6; background-size: contain;">
                    </a>
                  <?php endif;?>

                  <a href="<?php echo HOST_URL?>/<?php echo urlencode($value->subs_public_profile)?>">
                    <h1><?php echo $value->{title_.$lan}?></h1>
                  </a>
                  <p> <?php $addressText = $value->{address_line1_.$lan} . $value->{address_line2_.$lan}; echo stripslashes($addressText)?></p>
      			      <ul>
                  	<!-- <li><?php echo number_format($value->likes);?> <i class="ion-thumbsup"></i></li>-->
                    <li><?php echo number_format($value->profile_visits);?> <i class="ion-eye"></i></li>
                  </ul>
      		</div>
        </div>

        <?php if($key == 6 && (isset($_GET) && $_GET['v'] == 'featured')){ break;}?>

      <?php endforeach;?>

      <?php if(count($subscribers) > 7 && (isset($_GET) && $_GET['v'] == 'featured')):?>
      <div class="col-lg-3 col-md-6">
      	<div class="card" style="padding-top:75px;">
              <h2><?php echo lang('auto.total')?></h2>
              <h3><?php echo ($count_ads - 7);?></h3>
              <p><?php echo lang('auto.health_centres_listed')?></p>
              <a href="<?php echo HOST_URL?>/search/?country=&v=unfeatured&city=&category=<?php echo (isset($_GET['category']) && $_GET['category'] != '') ? $_GET['category'] : '';?>&q=<?php echo (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';?>" class="card_button"><?php echo lang('auto.view_all')?></a>
  		</div>
      </div>
      <?php endif;?>

    <div class="col-lg-12">
      <?php echo (isset($_GET) && $_GET['v'] == 'featured') ? '' : $page_links;?>
    </div>

    <?php else:?>

            <p class="h1 text-center"><?php echo lang('auto.cudnt_find_your_subscriber')?></p>
            <div class="clear"></div>
            <div class="text-center">
              <!-- <a href="#" class="button button-secondary text-uppercase m-t-lg">Invite Subscriber <i class="ion-ios-arrow-thin-right"></i></a> -->
            </div>
          <?php endif;?>


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
<!--          ARTICLE-->

          <?php if($articles):?>
          <div class="col-lg-7 article ">
              <div class="row aricle_head">
                    <div class="col-lg-10">
                        <h1><?php echo lang('auto.latest_articles')?></h1>
                     </div>
                     <div class="col-lg-2 pull-right">
                     <a href="<?php echo HOST_URL?>/articles/" class="article_button pull-right"><?php echo lang('auto.view_all')?></a>
                     </div>
                 </div>

                 <div class="row aricle_content">

                    <?php foreach($articles AS $key => $value):?>
                   <div class="col-lg-6">
                        <img src="<?php echo ARTICLES_SHOW_PATH.$value->image?>" alt="">
                          <h1 title="<?php echo $value->{title_.$lan};?>"><?php echo character_limiter($value->{title_.$lan}, 30, '...')?></h1>
                          <p><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 80, '...');?></p>
                          <a href="<?php echo HOST_URL?>/articles/details/<?php echo $this->encrypt->encode($value->articles_id);?>" class="article_content_button"><?php echo lang('auto.read_more')?></a></LI>
                   </div>
                   <?php endforeach;?>

                 </div>
            </div>
 <!--         ARTICLE END-->

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
                 <div class="row ">
                 <div class="col-lg-12 news_content">
                      <img src="<?php echo NEWS_SHOW_PATH.$value->image?>" alt="">
                      <h1><?php echo character_limiter($value->{news_title_.$lan}, 30, '...');?></h1>
                      <p><?php echo character_limiter(strip_tags(stripslashes($value->{description_.$lan})), 60, '...');?></p>
                      <a href="<?php echo HOST_URL?>/news/details/<?php echo $this->encrypt->encode($value->news_id);?>" class="article_content_button"><?php echo lang('auto.read_more')?></a>
                 </div>
                 </div>
                 <?php endforeach;?>

                 </div>

            </div>
 <!-- NEWS end-->

 <?php endif;?>

        </div>
    </div>
  </div>


  <script type="text/javascript">

    $(function(){

          $(document).on('click','#use_location',function(){

            if($(this).is(':checked'))
            {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){

                  $('#_lat').val(position.coords.latitude);
                  $('#_lng').val(position.coords.longitude);

                  $('#filterFrm').submit();

                },function(error){
                  alert(error);
                });
            } else {
                alert('Error getting geolocation');
            }
            }else{
              $('#_lat').val('');
            $('#_lng').val('');
            $('#_dt').val('');
            $('#filterFrm').submit();
            }

          });


          $(document).on('click','.distance-sm .sort-submenu li a',function(){

            var elem = $(this);

            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(function(position){

                  $('#_lat').val(position.coords.latitude);
                  $('#_lng').val(position.coords.longitude);
                  $('#_dt').val(elem.attr('href'));
                  $('#filterFrm').submit();

                },function(error){

                  $('#_lat').val('');
                $('#_lng').val('');
                $('#_dt').val('');
                $('#filterFrm').submit();

                });

        } else {

            $('#_lat').val('');
            $('#_lng').val('');
            $('#_dt').val('');
            $('#filterFrm').submit();
        }

        return false;

          });

          $(document).on('change','#_d',function(){

            if($(this).val() != '')
            {
              $('#_dt').val($(this).val());
          $('#filterFrm').submit();
            }

          });

    })

  </script>
