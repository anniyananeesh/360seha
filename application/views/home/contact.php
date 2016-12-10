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

            <div class="col-lg-6">
            	<h1><?php echo lang('auto.drop_us_line')?></h1>
              <div class="clearfix"></div>

              <form action="" method="post" name="contactUs" id="contactUs" class="contact-frm">

                  <?php if(isset($Error)):?>
                        <div class="alert <?php echo(isset($Error) && $Error == 'Y') ? 'alert-danger' : 'alert-success';?>">
                            <?php echo $MSG;?>
                            <a class="close" onclick="javascript:$(this).parent().remove();" >
                                <i class="ion-close-round"></i>
                            </a>
                        </div>
                      <div class="clearfix"></div>
                  <?php endif;?>

                  <div class="form-group">
                    <label class="form-label"><?php echo lang('auto.your_fullname')?></label>
                    <input type="text" class="form-control form-control-text" placeholder="" name="full_name" id="full_name"/>
                    <?php if(form_error('full_name')):?>
                                <div class="error">
                                    <?php echo form_error('full_name');?> ...
                                </div>
                          <?php endif;?>
                          <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="form-label"><?php echo lang('auto.email_address')?></label>
                    <input type="text" class="form-control form-control-text" placeholder="" name="email" id="email"/>

                    <?php if(form_error('email')):?>
                                <div class="error">
                                    <?php echo form_error('email');?> ...
                                </div>
                          <?php endif;?>
                          <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="form-label"><?php echo lang('auto.contact_no')?></label>
                    <input type="text" class="form-control form-control-text" placeholder="" name="contact_no" id="contact_no"/>

                    <?php if(form_error('contact_no')):?>
                        <div class="error">
                          <?php echo form_error('contact_no');?> ...
                        </div>
                    <?php endif;?>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="form-label"><?php echo lang('auto.message')?></label>
                    <textarea class="form-control form-control-text" name="message" id="message"></textarea>

                    <?php if(form_error('message')):?>
                                <div class="error">
                                    <?php echo form_error('message');?> ...
                                </div>
                          <?php endif;?>
                          <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg"><?php echo lang('auto.send_message')?></button>
                    <div class="clearfix"></div>
                  </div>

                  <div class="clearfix"></div>

              </form>

            </div>

            <div class="col-lg-6">

              <p class="contact-head"><?php echo lang('auto.for_online_queries')?></p>
              <h1 class="nopads nomargins"><?php echo INFO_EMAIL?></h1>
              <div class="clearfix"></div>

              <!-- <p class="contact-head visible-lg-block visible-md-block"><?php echo lang('auto.follow_us_on')?></p>
              <div class="block visible-lg-block visible-md-block">
                <a href="https://www.facebook.com/360seha"><img src="<?php echo IMG_PATH?>/sm-footer-facebook.png"/></a>
                <a href="https://www.twitter.com/360seha"><img src="<?php echo IMG_PATH?>/sm-footer-twitter.png"/></a>
                <a href="https://www.youtube.com/360seha"><img src="<?php echo IMG_PATH?>/sm-footer-youtube.png"/></a>
              </div>-->

            </div>

        </div>
    </div>
  </div>

  <!--BODY CONTENT  END-->
